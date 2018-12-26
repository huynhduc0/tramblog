<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CommentsModel;
use App\HomeModel;
use App\TypeModel;
use App\BillModel;
use App\BillDetailModel;
use App\CustomerModel;
use App\BrandModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\ShopModel;
use Mail;
class AdminController extends Controller
{
    //
    protected $id;
    protected $profile;
    public function __construct()
    {
    	// var_dump(Auth::check());
    	// die(Auth::user('account_type'));
    	// if(!Auth::user('account_type')==1){
    	// 	die(redirect(url('dn')));
    	// }
    }
    function check(){
    	if(!Auth::user('account_type')==1){
    		die(redirect(url('dn')));
    	}
    }
    public function boot()
    {
    	$profile=User::find(Auth::id());
    	// dd($profile);
    	view()->share('profile', $profile);
    }
    function index()
    {
    	echo AdminController::check();
    	$ana_post=HomeModel::selectRaw('day(created_at) as ngay,count(id) as posts')->groupBy('ngay')->get()->toArray();
        $ana_comment=CommentsModel::selectRaw('day(created_at) as ngay,count(id) as comment')->groupBy('ngay')->get()->toArray();
        View::share('ana_post',$ana_post);
         View::share('ana_comment',$ana_comment);
    	$profile=User::find(Auth::id());
    	$post_this_week=DB::table("posts")->whereRaw('month(created_at)=?',date('m'))->get()->toArray();
    	$comment_this_week=DB::table("comments")->whereRaw('month(created_at)=?',date('m'))->get()->toArray();
    	$sum_view=HomeModel::selectRaw('sum(view_count) as sum_view')->get();
    	$task=HomeModel::select('posts.*','name','avatar','image')
			 		->join('users', 'posts.author_id', '=', 'users.id')
			 		->orderBy('created_at','desc')
          			->where('status',0)
			 		->get()
			 		->toArray();
    	// view()->share('profile', $profile);
		$all=HomeModel::selectRaw('posts.*,name,avatar,image,count(comments.id) as slcm')
			 		->join('users', 'posts.author_id', '=', 'users.id')
			 		->leftjoin('comments', 'posts.id', '=', 'comments.post_id')
			 		->orderBy('created_at','desc')
			 		->groupBy('posts.id','author_id','type_id','title','content','image','comment_count','status','published_at','created_at','updated_at','view_count','name','avatar','image')
			 		->get()
			 		->toArray();
    	return view('admin.index', compact('post_this_week','comment_this_week','profile','sum_view','task','all'));
    }

    function duyet($id)
    {
    	echo AdminController::check();
    	$bai=HomeModel::find($id);
    	$bai->status=2;
    	$bai->save();
    	return redirect()->back();
    }
     function chan($id)
    {
    	echo AdminController::check();
    	$bai=HomeModel::find($id);
    	$bai->status=-1;
    	$bai->save();
    	return redirect()->back();
    }
     function duyetloai($id)
    {
    	$bai=TypeModel::find($id);
    	$bai->status=1;
    	$bai->save();
    	return redirect()->back();
    }
     function chanloai($id)
    {
    	echo AdminController::check();
    	$bai=TypeModel::find($id);
    	$bai->status=0;
    	$bai->save();
    	return redirect()->back();
    }
    function addtype(Request $req)
    {
    	echo AdminController::check();
    	$type= new TypeModel;
    	$type->type_name=$req->name;
    	$type->save();
    	return redirect()->back();
    }
     function hienhang($id)
    {
        echo AdminController::check();
        $bai=ShopModel::find($id);
        $bai->active=0;
        $bai->save();
        return redirect()->back();
    }
     function anhang($id)
    {
        $bai=ShopModel::find($id);
        $bai->active=1;
        $bai->save();
        return redirect()->back();
    }

    function duyetloaihang($id)
    {
        echo AdminController::check();
        $bai=BrandModel::find($id);
        $bai->status=1;
        $bai->save();
        return redirect()->back();
    }
     function chanloaihang($id)
    {
        $bai=BrandModel::find($id);
        $bai->status=0;
        $bai->save();
        return redirect()->back();
    }

     function addtypeproduct(Request $req)
    {
        echo AdminController::check();
        $type= new BrandModel;
        $type->brandname=$req->name;
        $type->save();
        return redirect()->back();
    }

    function type()
    {
    	echo AdminController::check();
    	$admintypes=TypeModel::select('*')->get()->toArray();
        foreach ($admintypes as $key=>$value) {
            $admintypes[$key]['count']=TypeModel::find($value['id'])->posts()->get()->toArray();
        };
        $users=User::select('*')->get()->toArray();
    	return view('admin.type', compact('admintypes','users'));
	}
    //rdtfyguhjkl



    function admin_product()
    {
        echo AdminController::check();
        $brand=BrandModel::select('*')->get()->toArray();
        foreach ($brand as $key=>$value) {
            $brand[$key]['count']=BrandModel::find($value['id'])->posts()->get()->toArray();
        };
        $sanpham=ShopModel::select('*')->get()->toArray();
         foreach ($sanpham as $key=>$value) {
            $sanpham[$key]['img']= explode(',',$value['img']);
        }
        return view('admin.hang', compact('brand','sanpham'));
    }
     function shop()
    {
        echo AdminController::check();
        $brand= BrandModel::all();
        // dd($brand);
        return view('admin.shop', compact('brand'));
    }
	 function changetype_acc(Request $req)
      {
      	$acc=User::find($req->id);
      	$acc->account_type = ($req->status=='1') ? 0 : 1;
      	$acc->save();
      }
      function updatetype(Request $req)
      {
      	$type=TypeModel::find($req->id);
      	$type->type_name= $req->newname;
      	$type->save();
      	return redirect()->back();
      }
       function updatetypeproduct(Request $req)
      {
        $type=BrandModel::find($req->id);
        $type->brandname= $req->newname;
        $type->save();
        return redirect()->back();
      }
      function suaproduct($id){
        $product=ShopModel::find($id);
         $brand= BrandModel::all();
        return view("admin.suaproduct", compact('product','brand'));
      }
      function postaddproduct(Request $req)
      {
        // dd($req->quantity);
        $product = new ShopModel;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->count =$req->quantity;
        $product->BrandID = $req->type_id;
        $product->description = $req->description;
        $product->img=substr($req->image,0,strlen($req->image)-1);
        $product->save();
        return redirect()->back();
      }
      function saveproduct(Request $req,$id)
      {
        // dd($req);
          $product = ShopModel::find($id);
        $product->name = $req->name;
        $product->price = $req->price;
        $product->count =$req->quantity;
        $product->BrandID = $req->type_id;
        $product->description = $req->description;
        $product->img=substr($req->image,0,strlen($req->image)-1);
        $product->save();
        // dd($product);
        return redirect(url('admin_product'));
      }
      function shop_list()
      {
       $sanpham=ShopModel::all();
       $task=BillModel::select('bill.*','customer.address','customer.name', 'customer.email','customer.phone')
                    ->join('customer', 'customer.id', '=', 'bill.customer_id')
                    ->orderBy('status','desc')
                    ->get()
                    ->toArray();

        foreach ($task as $key=>$value) {
            $task[$key]['sp']=BillDetailModel::select('*')->join('products', 'products.id', '=', 'bill_detail.product_id')->where('bill_id',$value['id'])->get()->toArray();
        }
        // dd($task);
        $profile=User::find(Auth::id());
       return view('admin.admin_shop', compact('shop','profile','task'));
      }
       function duyethang($id)
    {
        echo AdminController::check();
        $bai=BillModel::find($id);
        $bai->status=1;
        $bai->save();
          $info="Tổng: ".$bai->total." VND<br>Thời gian đặt: ".$bai->date.'<br>'.'Duyệt lúc '.date('Y-m-d G:i:s')."<br> Hãy chuẩn bị phí khi nhận hàng dự kiến giao trong 2-3 ngày hihi";
        $cus = CustomerModel::find($bai->customer_id);
        $to_name=$cus->name;
        $to_email=$cus->email;
        // dd($to_email);
        $bill_detail=BillDetailModel::select('*')->join('products', 'products.id', '=', 'bill_detail.product_id')->where('bill_id',$bai->id)->get()->toArray();
        // dd($bill_detail);
           $title="Chào bạn, Chúc mừng đơn hàng số DH".$bai->id." đã được duyệt";
           $sp="";
        foreach ($bill_detail as $value) {
             $anh= explode(',',$value['img']);
            $sp = $sp.'<tr><td><img style="height:auto;width:100px"  src='.$anh[0]."></td>
                            <td>".$value['name']."</td> <td>". $value['quantity']."</td><td>".$value['price'].'</td></tr>';
        }
      
           Mail::send('shop.mail',array('name'=>$to_name,'email'=>$to_email,'title'=>$title, 'content'=>$sp,'info'=>$info), function($message) use($to_name, $to_email){
                $message->to($to_email,$to_name)->subject("Đơn hàng đã được ghi nhận");
                $message->from('huynhduc12345qaz@gmail.com','Đơn hàng');
            });
        return redirect(url('admin_shop'));
    }
    
     function chanhang($id)
    {
       echo AdminController::check();
        $bai=BillModel::find($id);
        $bai->status=0;
        $bai->save();
        // dd($bai);
          $info="Tổng: ".$bai->total." VND<br>Thời gian đặt: ".$bai->date.'<br>'.'Duyệt lúc '.date('Y-m-d G:i:s');
        $cus = CustomerModel::find($bai->customer_id);
        $to_name=$cus->name;
        $to_email=$cus->email;
        // dd($to_email);
        $bill_detail=BillDetailModel::select('*')->join('products', 'products.id', '=', 'bill_detail.product_id')->where('bill_id',$bai->id)->get()->toArray();
        // dd($bill_detail);
           $title="Chào bạn, Thật tiếc đơn hàng DH".$bai->id." đã bị từ chối";
           $sp="";
           // dd($bill_detail);
        foreach ($bill_detail as $value) {
             $anh= explode(',',$value['img']);
            $sp = $sp.'<tr><td><img style="height:auto;width:100px"  src='.$anh[0]."></td>
                            <td>".$value['name']."</td> <td>". $value['quantity']."</td><td>".$value['price'].'</td></tr>';
            $updatesp=ShopModel::find($value['product_id']);
            $updatesp->count=$updatesp->count+$value['quantity'];
            $updatesp->save();
        }
           Mail::send('shop.mail',array('name'=>$to_name,'email'=>$to_email,'title'=>$title, 'content'=>$sp,'info'=>$info), function($message) use($to_name, $to_email){
                $message->to($to_email,$to_name)->subject("Đơn hàng đã được ghi nhận");
                $message->from('huynhduc12345qaz@gmail.com','Đơn hàng');
            });
        return redirect(url('admin_shop'));
    }
}
