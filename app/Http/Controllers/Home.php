<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\HomeModel;
use App\TypeModel;
use App\User;
use App\CommentsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
class Home extends Controller
{
    
    function index()
    {
    	$post['alltypes']=TypeModel::select('*')->get()->toArray();
    	$recentPosts=HomeModel::select('posts.*','type_name')
			 		->join('types', 'posts.type_id', '=', 'types.id')
			 		->orderBy('created_at','desc')
          ->where('posts.status',2)
           ->where('types.status',1)
			 		->limit(6)
			 		->get()
			 		->toArray();
			  View::share('recentPosts',$recentPosts);
        $all=HomeModel::select('posts.*','type_name')
          ->join('types', 'posts.type_id', '=', 'types.id')
          ->orderBy('created_at','desc')
          ->where('posts.status',2)
           ->where('types.status',1)
          ->get()
          ->toArray();
          $first=rand(0,count($all)-1);
          $end=rand(0,count($all)-1);
          while($first==$end){
                $first=rand(0,count($all)-1);
                $end=rand(0,count($all)-1);
          };
         $head[0]=$all[$first];
         $head[1]=$all[$end];
         // dd($head); die();
        View::share('recentPosts',$recentPosts);
			 if(Auth::check()){
			 $profile=User::select('id','name','avatar','account_type','author_intro')->where('id',Auth::id())->get()->first();
			  View::share('profile', $profile);
			  $myPosts=HomeModel::select('posts.*','type_name','view_count')
			 ->join('types', 'posts.type_id', '=', 'types.id')
			 ->where('author_id',Auth::id())
			 ->orderBy('created_at','desc')
			  ->paginate(3);
			 View::share('myPosts', $myPosts);
			}
    	return view('index', compact('post','head'));
    }
    function loadMore($offset,$limit)
    {
    	$recentPosts=HomeModel::select(	'posts.*','type_name')
			 		->join('types', 'posts.type_id', '=', 'types.id')
			 		->orderBy('created_at','desc')
          ->where('posts.status',2)
           ->where('types.status',1)
			 		->limit($limit)
			 		->offset($offset)
			 		->get()
			 		->tojSon();
		return $recentPosts;
    }
    function viewAPost($id)
    {
    	$post['thisPost']=HomeModel::find($id);
    	$post['type']=TypeModel::find($post['thisPost']['type_id']);
    	$post['author_info']=User::find($post['thisPost']['author_id']);
    	$post['comments']=CommentsModel::select('comments.*', 'name', 'avatar')
    					->join('users', 'users.id', '=', 'comments.author_id')
    					->where('post_id',$id)
    					->get()
    					->toArray();
		HomeModel::where('id',  $post['thisPost']['id'])
            	->update(['view_count' => $post['thisPost']['view_count']+1]);
            	if(Auth::check()){
			 $profile=User::select('id','name','avatar','account_type','author_intro')->where('id',Auth::id())->get()->first();
			  View::share('profile', $profile);
			  $myPosts=HomeModel::select('posts.*','type_name','view_count')
			 ->join('types', 'posts.type_id', '=', 'types.id')
			 ->where('author_id',Auth::id())
			 ->orderBy('created_at','desc')
			 ->paginate(2);
			 View::share('myPosts', $myPosts);
			}
    	return view('post', compact('post'));
    }
      function viewPostsViaCategory($category){
      	$post['type']=TypeModel::find($category);
    	$post['Posts']= TypeModel::find($category)->posts()->where('posts.status',2)->get()->toArray();
    	 if(Auth::check()){
			 $profile=User::select('id','name','avatar','account_type','author_intro')->where('id',Auth::id())->get()->first();
			  View::share('profile', $profile);
			  $myPosts=HomeModel::select('posts.*','type_name','view_count')
			 ->join('types', 'posts.type_id', '=', 'types.id')
			 ->where('author_id',Auth::id())
			 ->orderBy('created_at','desc')
			  ->paginate(2);
			 View::share('myPosts', $myPosts);
			}
    	return view('category', compact('post'));
      }
      function post_comment(Request $req)
      {
      	$comment= new CommentsModel;
      	$comment->content=$req->message;
      	$comment->author_id=Auth::id();
      	$comment->post_id=$req->post_id;
      	$comment->reply_id = ($req->has('reply_id')) ? $req->reply_id : 0;
        $comment->save();
        $update_comment= HomeModel::find($req->post_id);
        $update_comment->comment_count++;
        if(!$update_comment->save()) return "Lỗi";
      return redirect()->back();
      }
      function writepost()
      {
      	if(Auth::check()){
      		return view('writepost');
      	}
      	else{
      		redirect('dn');
      	}
      }
      function savepost(Request $req)
      {
      	$home = new HomeModel;
      	$home->type_id=$req->type_id;
      	$home->author_id=Auth::id();
      	$home->title=$req->title;
      	$home->image=$req->image;
      	$home->content=$req->content;
      	$home->save();
      	return 'success';
      }
      function updatepost(Request $req,$id)
      {
      	$home = HomeModel::find($id);
      	$home->type_id=$req->type_id;
      	//$home->author_id=Auth::id();
        $home->status=0;
      	$home->title=$req->title;
      	$home->image=$req->image;
      	$home->content=$req->content;
      	$home->save();
      	return 'success';
      }
      function suapost($id)
      {
      	$post=HomeModel::find($id);
      	$post['content']=trim(preg_replace('/\s\s+/', ' ', $post['content']));
      	if ($post['author_id']!=Auth::id())
      		return redirect(url('homepage'));
      	else
      	return view('suapost',compact('post'));
      }
      function changestatus(Request $req)
      {
      	$post=HomeModel::find($req->id);
      	$post->status = ($req->status=='show') ? 1 : 2;
      	echo $post->status;
      	$post->save();
      }
       function bio()
      {
      	if(Auth::check()){
      		return view('bio');
      	}
      	else{
      		redirect('dn');
      	}
      }
        function savebio(Request $req)
      {
      	$home = User::find(Auth::id());
      	$home->author_intro=$req->content;
      	$home->avatar=$req->img;
      	// dd($req);
      	 request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $home->avatar='/images/'.$imageName;
      	$home->save();
      	return 'success';
      }
      function search($key)
      {
        $post=HomeModel::search($key)->get()->tojSon();
        return $post;
      }
}
