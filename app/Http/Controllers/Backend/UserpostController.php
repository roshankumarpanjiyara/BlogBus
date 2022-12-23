<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->where('username',auth()->user()->username)->get();
        return view('backend.user.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:200',
            'body'=>'required|max:5000',
            'image'=>'mimes:jpeg,png',
            'category'=>'required'
        ]);
        $data = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,320)->save('storage/posts/'.$name_gen);
            $image_url = 'storage/posts/'.$name_gen;
        }else{
            $image_url = NULL;
        }
        $data['image']=$image_url;
        $data['category_id']=$request->category;
        $data['username'] = auth()->user()->username;
        $data['created_by'] = auth()->user()->name;
        $data['status']=0;
        $data['approved_by']='';
        $data['slug']=Str::slug($request->title);
        Post::create($data);
        Alert::success('Post created and will be approved within 24 hours!')->autoClose(3000);
        return redirect()->route('userposts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$slug)
    {
        $categories = Category::get();
        $post = Post::where('id',$id)->where('slug',$slug)->first();
        $postId = $post->id;
        $showpost = Post::find($postId);
        $userPostPic = $showpost->image;
        // Check for correct user
        if(auth()->user()->username !==$showpost->username){
            return redirect('/userposts')->with('error', 'Unauthorized Page');
        }
        return view('backend.user.post.show',compact('showpost','userPostPic','postId','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$slug)
    {
        $post = Post::where('id',$id)->where('slug',$slug)->first();
        $postId = $post->id;
        $userpost = Post::find($postId);
        //Check if post exists before deleting
        if (!isset($userpost)){
            return redirect('/userposts')->with('error', 404);
        }

        // Check for correct user
        if(auth()->user()->username !==$userpost->username){
            return redirect('/userposts')->with('error', 404);
        }
        return view('backend.user.post.edit',compact('userpost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|max:200',
            'body'=>'required|max:5000',
            'image'=>'mimes:jpeg,png',
            'category'=>'required'
        ]);
        $data = $request->all();
        $userpost = Post::find($id);
        if($request->hasFile('image')){
            $image_path = $userpost->image;
            if($image_path!=null){
                unlink($image_path);
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,320)->save('storage/posts/'.$name_gen);
            $image_url = 'storage/posts/'.$name_gen;
        }else{
            $image_url = $userpost->image;
        }
        if($request->status){
            $status = $request->status;
        }else{
            $status = $userpost->status;
        }
        if($request->approved_by){
            $approved_by = $request->approved_by;
        }else{
            $approved_by = $userpost->approved_by;
        }
        if($request->username){
            $username = $request->username;
        }else{
            $username = $userpost->username;
        }
        $data['image']=$image_url;
        $data['username'] =$username;
        $data['status']=$status;
        $data['approved_by']=$approved_by;
        $data['postmessage']=NULL;
        if($request->delete_photo == 1){
            $image_path = $userpost->image;
            unlink($image_url);
            $data['image']=NULL;
        }
        $userpost->update($data);
        toast('Post updated!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->route('userposts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userpost = Post::find($id);
        //Check if post exists before deleting
        if (!isset($userpost)){
            return redirect('/userposts')->with('error', 404);
        }

        // Check for correct user
        if(auth()->user()->username !==$userpost->username){
            return redirect('/userposts')->with('error', 404);
        }

        // if($userpost->image != '24webinfo.jpg'){
             // Delete Image
        //     Storage::delete('public/post/'.$userpost->image);
        // }
        $image_path = $userpost->image;
        if($image_path!=null){
            unlink($image_path);
        }
        $userpost->delete();
        toast('Post deleted!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->route('userposts.index');
    }

}
