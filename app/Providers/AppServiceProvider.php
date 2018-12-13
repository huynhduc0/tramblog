<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\TypeModel;
use App\HomeModel;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $types=TypeModel::select('*')->where('status',1)->get()->toArray();
        foreach ($types as $key=>$value) {
            $types[$key]['count']=TypeModel::find($value['id'])->posts()->get()->toArray();
            // var_dump(count($value['count']));
        };
        View::share('types',$types);
        $mostReadPosts=HomeModel::select('posts.*' ,'type_name')->where('posts.status',2)->where('types.status',1)
                ->join('types', 'posts.type_id', '=', 'types.id')->orderBy('view_count','desc')->limit(6)->get()->toArray();
        View::share('mostReadPosts',$mostReadPosts);
       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        //  $userId = Auth::id();
        // echo $UserID;
        // $user=User::find($userId)->get->toArray();
        // view('nav_user', $user)->render();
    }
}
