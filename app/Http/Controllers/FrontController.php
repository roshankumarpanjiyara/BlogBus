<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function index(Request $request){
        // $request->validate(["search" => "required"]);

        // if($request->search){
        //     $posts = Post::where('title','like','%'.$request->search.'%')
        //     ->orWhere('body','like','%'.$request->search.'%')
        //     ->orWhere('created_by','like','%'.$request->search.'%')
        //     ->latest()
        //     ->paginate(5);
        //     $recentposts = Post::where('status', 1)->latest()->limit(5)->get();
        //     $categories = Category::get();
        //     $topviewpost = Post::where('reads','>=',10)->get();
        //     return view('layouts.index',compact('posts','categories','recentposts','topviewpost'));
        // }

        $posts = Post::where('status', 1)->latest()->paginate(5);
        $recentposts = Post::where('status', 1)->latest()->limit(5)->get();
        $categories = Category::get();
        $topviewpost = Post::where('reads','>=',10)->get();
        // dd($topviewpost);

        return view('frontend.layouts.index',compact('posts','categories','recentposts','topviewpost'));
    }

    public function contact(){
        return view('frontend.layouts.contact');
    }

    public function about(){
        return view('frontend.layouts.about');
    }

    public function showPost($id,$slug)
    {
        $recentposts = Post::where('status', 1)->latest()->limit(5)->get();
        $categories = Category::get();
        $posts = Post::where('id',$id)->where('slug',$slug)->first();
        $postId = $posts->id;
        $showpost = Post::find($postId);
        $postFromSameCategories = Post::inRandomOrder()->where('status', 1)->where('category_id',$showpost->category_id)->where('id','!=',$showpost->id)->limit(4)->get();
        $postFromSameCategoriesIds =  [];
        foreach($postFromSameCategories as $post){
    		array_push($postFromSameCategoriesIds,$post->id);
    	}
    	$randomItemPosts = Post::whereNotIn('id',$postFromSameCategoriesIds)->where('category_id',$showpost->category_id)->where('id','!=',$showpost->id)->where('status', 1)->limit(4)->get();
        $post = Post::where('id',$postId)->first();
        $userPostPic = $post->image;
        $postKey = 'post_' . $postId;
        // Check if blog session key exists
        // If not, update view_count and create session key
        if (!Session::has($postKey)) {
            $showpost->reads = $showpost->incrementReadCount();
            Session::put($postKey, 1);
        }
        $commentsshow = Comment::latest()->where('post_id',$postId)->get();
        $topviewpost = Post::where('reads','>=',10)->get();
        return view('frontend.layouts.blog.show',compact('showpost','postFromSameCategories','randomItemPosts','userPostPic','postId','posts','slug','recentposts','categories','commentsshow','topviewpost'));
    }

    public function allCategoryPost($slug,Request $request){
        // if($request->search){
        //     $categories = Category::get();
        //     $category  = Category::where('name',$name)->first();
        //     $categoryId = $category->id;
        //     $posts = Post::where('category_id',$category->id)
        //     ->where('title','like','%'.$request->search.'%')
        //     ->orWhere('created_by','like','%'.$request->search.'%')
        //     ->latest()
        //     ->paginate(5);
        //     $recentposts = Post::where('status', 1)->latest()->limit(5)->get();
        //     $topviewpost = Post::where('reads','>=',10)->get();
        //     return view('layouts.blog.category',compact('posts','categories','category','categoryId','recentposts','topviewpost'));
        // }

        $categories = Category::get();
        $recentposts = Post::where('status', 1)->latest()->limit(5)->get();
        $category  = Category::where('slug',$slug)->first();
        $categoryId = $category->id;
        $posts = Post::where('category_id',$category->id)->where('status',1)->latest()->paginate(5);
        $topviewpost = Post::where('reads','>=',10)->get();
        return view('frontend.layouts.blog.category',compact('posts','categories','category','categoryId','recentposts','topviewpost'));
    }

    public function allUserPost($name,$id,$username,Request $request){
        $recentposts = Post::where('status', 1)->latest()->limit(5)->get();
        $user  = User::where('name',$name)->where('id',$id)->where('username',$username)->first();
        // dd($user);
        $userId = $user->id;
        $posts = Post::where('username',$user->username)->latest()->paginate(5);
        return view('frontend.layouts.blog.userpost',compact('posts','userId','user','recentposts'));
    }

    public function topviewblog(){
        $topview = Post::where('reads','>=',10)->orderBy('reads','DESC')->get();
        return view('frontend.layouts.blog.topviewblog',compact('topview'));
    }

    public function search(Request $request){
        $request->validate(["search" => "required | min:3"]);
        if($request->search){
            $posts = Post::where('title','like','%'.$request->search.'%')
            ->orWhere('created_by','like','%'.$request->search.'%')
            ->where('reads','ASC')
            ->latest()
            ->paginate(5);
            $recentposts = Post::where('status', 1)->latest()->limit(5)->get();
            $categories = Category::get();
            $topviewpost = Post::where('reads','>=',10)->get();
            return view('frontend.layouts.blog.search',compact('posts','categories','recentposts','topviewpost'));
        }
    }

    public function searchPost(Request $request){
        $request->validate(["search" => "required | min:3"]);
        if($request->search){
            $posts = Post::where('title','like','%'.$request->search.'%')
            ->orderBy('reads','ASC')
            ->limit(10)
            ->get();
            return view('frontend.layouts.blog.search_post',compact('posts'));
        }
    }

}
