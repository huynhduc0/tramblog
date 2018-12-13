<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CommentsModel;
use App\HomeModel;
use App\TypeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
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
}
