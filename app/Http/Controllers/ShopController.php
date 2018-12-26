<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ShopModel;
use App\BrandModel;
use App\TinhThanhPho;
use App\QuanHuyen;
use App\XaPhuong;
use App\BillModel;
use App\BillDetailModel;
use App\CustomerModel;
use Illuminate\Support\Facades\Input;
use Darryldecode\Cart\Cart;
use Mail;
class ShopController extends Controller
{
    function index()
    {
    	$sanpham=ShopModel::select('*')->where('active',1)->get()->toArray();
    	$sanpham=ShopModel::paginate(9);
        foreach ($sanpham as $key=>$value) {
            $sanpham[$key]['img']= explode(',',$value['img']);
        }
    	return view('shop.index',compact('sanpham'));
    }
    function viewshop(){
    	$sanpham['brand']=BrandModel::select('*')->get()->toArray();
        // dd($sanpham);
    	$sanpham['sanpham']=ShopModel::select('*')->get()->toArray();
    	$sanpham['sanpham']=ShopModel::paginate(6);
          foreach ($sanpham['sanpham'] as $key=>$value) {
            $sanpham['sanpham'][$key]['img']= explode(',',$value['img']);
        }
    	return view('shop.shop',compact('sanpham'));
    }
    function viewShopViaBrand($brand){
    	$sanpham['selected']=$brand;
    	$sanpham['brand']=BrandModel::select('*')->get()->toArray();
    	$sanpham['sanpham']=ShopModel::where('brandID',$brand)->paginate(6);
         foreach ($sanpham['sanpham'] as $key=>$value) {
            $sanpham['sanpham'][$key]['img']= explode(',',$value['img']);
        }
    	return view('shop.shop',compact('sanpham'));
    }
    function viewProduct($id)
    {
    	$sanpham=ShopModel::select('*')->join('brands_shop','brands_shop.id','products.brandID')->where('products.id',$id)->get()->toArray();
        // dd($sanpham);
        $sanpham[0]['img']= explode(',',$sanpham[0]['img']);
    	return view('shop.detail',compact('sanpham'));
    }
    function addCart(Request $req)
    {
    	$userId=3;
    	$sl=$req['quantity'];
 		$sanpham=ShopModel::find($req['id']);
        $sanpham['img']= explode(',',$sanpham['img']);
    	\Cart::session($userId);
    	\Cart::add($sanpham['id'], $sanpham['name'], $sanpham['price'], $sl, array(
    		'img'=>$sanpham['img'][0]
    	));
    	$cart=\Cart::getContent();
   		return view('shop.cart',compact('cart'));
    }
    function cart()
    {
        \Cart::session(3);
        $cart=\Cart::getContent();
        return view('shop.cart',compact('cart'));
    }
    function updateCart(Request $req){
        $sanpham=ShopModel::find($req->id);
        if($sanpham['count']<$req->qty)
            echo 'Không đủ hàng';
        else{
         \Cart::session(3);
          $cart = \Cart::getContent();
        \Cart::update($req->id, array(
            'quantity' => -$cart[$req->id]->quantity + $req->qty, 
        ));
        echo  \Cart::getTotal().' VND'; 
        }
    }
    function deleteCart(Request $req)
    {
         \Cart::session(3);
         \Cart::remove($req->id);
          $cart = \Cart::getContent();
        echo  \Cart::getTotal(); 
    }
    function checkout()
    {
         \Cart::session(3);
          $cart = \Cart::getContent();
          $total=\Cart::getTotal();
        return view('shop.checkout',compact('cart','total'));
    }
    function getTinhThanhPho()
    {
        $all=TinhThanhPho::select('*')->get()->tojSon();
        echo $all;
    }
    function getQuanHuyen($matp)
    {
        $all=QuanHuyen::select('*')->where('matp',$matp)->get()->tojSon();
        echo $all;
    }
    function getXaPhuong($maqh)
    {
        $all=XaPhuong::select('*')->where('maqh',$maqh)->get()->tojSon();
        echo $all;
    }
    function makeorder(Request $req)
    {
        // dd($req->note);
        $tinh=TinhThanhPho::select('*')->where('matp',$req->tinhthanhpho)->get()->toArray();
        $huyen=QuanHuyen::select('*')->where('maqh',$req->quanhuyen)->get()->toArray();
        $customer= new CustomerModel;
        // $customer->timestamp=false;
        $customer->name=$req->name;
        $customer->address=$req->chitiet."-".$req->xaphuong."-".$huyen[0]['name']."-".$tinh[0]['name'];
        $customer->email=$req->email;
        $customer->phone=$req->phone;
        $customer->save();
        // var_dump($customer->id);
          \Cart::session(3);
          $cart = \Cart::getContent();
        $bill= new BillModel;
        $bill->customer_id=$customer->id;
        $bill->note = ($req->note) ? $req->note : "Không có";
        $bill->date=date('Y-m-d G:i:s');
        $bill->total=\Cart::getTotal();
        $bill->save();
        $sp="Chào bạn, chúng tôi đã nhận được đơn hàng số ".$bill->id." Tổng cộng: ".\Cart::getTotal();
        // dd($sp);
        foreach ($cart as $value) {
            // echo $value['id'].$value['quantity'].$value['price'];
            $sp = $sp."\n mã sản phẩm:".$value['id']." số lượng:". $value['quantity']." đơn giá:".$value['price'];
            // echo $sp;
            $billdetail= new BillDetailModel;
            $billdetail->bill_id=$bill->id;
            $billdetail->product_id=$value['id'];
            $billdetail->quantity=$value['quantity'];
            $billdetail->unit_price=$value['price'];
            $billdetail->save();
            $updatesp=ShopModel::find($billdetail->product_id);
            $updatesp->count=$updatesp->count-$billdetail->quantity;
            $updatesp->save();
            \Cart::remove($value['id']);
        }
        $to_name = $req->name;
        $to_email = $req->email;
        // dd($to_email);
        // $data = array('name'=>"tr.h.duc", "body" => $sp);
        $info="Tổng: ".$bill->total." VND<br>Thời gian đặt: ".$bill->date.'<br>'.'Duyệt lúc '.date('Y-m-d G:i:s');
       Mail::send('shop.mail',array('name'=>$req["name"],'email'=>$req["email"], 'content'=>$sp,'title'=>"","info"=>$info), function($message) use($to_name, $to_email){
            $message->to($to_email,$to_name)->subject("Đơn hàng đã được ghi nhận");
            $message->from('huynhduc12345qaz@gmail.com','Đơn hàng');
        });
         // mail($req->email,"Đã nhận đơn hàng số ".$req->id,$sp);
        return redirect()->back()->with('Thành công');
       
    }
    function rate(Request $req)
    {
        $sp=ShopModel::find($req->id);   
        $sp->rate=($sp->rate*$sp->rate_count+$req->start)/($sp->rate_count+1);
        $sp->rate_count=$sp->rate_count+1;
        $sp->save();
        echo $sp->rate;
    }
    function ratestar($id,$start)
    {
        $sp=ShopModel::find($id);   
        $sp->rate=($sp->rate*$sp->rate_count+$start)/($sp->rate_count+1);
        $sp->rate_count=$sp->rate_count+1;
        $sp->save();
    }
    function random()
    {
        $all = ShopModel::selectRaw('max(id) as sl,min(id) as nn')->get()->toArray();
        $id=rand($all[0]['nn'],$all[0]['sl']);
        // echo $all[0]['nn']." ".$all[0]['sl']
        $sanpham=ShopModel::find($id);
        while (!isset($sanpham['id'])) {
             $id=rand($all[0]['nn'],$all[0]['sl']);
            $sanpham=ShopModel::find($id);
        }
       $sanpham=ShopModel::select('*')->join('brands_shop','brands_shop.id','products.brandID')->where('products.id',$id)->get()->toArray();
        $sanpham[0]['img']= explode(',',$sanpham[0]['img']);

        $random=true;
        return view('shop.detail', compact('random','sanpham'));
    }

}
