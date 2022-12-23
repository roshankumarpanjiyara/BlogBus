<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.post.create');
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
            'image'=>'mimes:jpeg,png,jpg',
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
        //  notify()->success('Post created and will be approved within 24 hours!');
        Alert::success('Post created and will be approved within 24 hours!')->autoClose(3000);
         return redirect()->route('posts.index');
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
        return view('backend.admin.post.show',compact('showpost','userPostPic','postId','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$slug)
    {
        $posts = Post::where('id',$id)->where('slug',$slug)->first();
        $postId = $posts->id;
        $post = Post::find($postId);
        return view('backend.admin.post.edit',compact('post','posts','postId'));
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
            'image'=>'mimes:jpeg,png,jpg',
            'category'=>'required'
        ]);
        $data = $request->all();
        $post = Post::find($id);
        if($request->hasFile('image')){
            $image_path = $post->image;
            if($image_path!=null){
                unlink($image_path);
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,320)->save('storage/posts/'.$name_gen);
            $image_url = 'storage/posts/'.$name_gen;
        }else{
            $image_url = $post->image;
        }
        if($request->status){
            $status = $request->status;
        }else{
            $status = $post->status;
        }
        if($request->approved_by){
            $approved_by = $request->approved_by;
        }else{
            $approved_by = $post->approved_by;
        }
        if($request->username){
            $username = $request->username;
        }else{
            $username = $post->username;
        }
        $data['image']=$image_url;
        $data['username'] =$username;
        $data['status']=$status;
        $data['approved_by']=$approved_by;
        $data['postmessage']=NULL;
        if($request->delete_photo == 1){
            $image_path = $post->image;
            unlink($image_url);
            $data['image']=NULL;
        }
        $post->update($data);
        toast('Post updated!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $image_path = $post->image;
        if($image_path!=null){
            unlink($image_path);
        }
        $post->delete();
        toast('Post deleted!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->back();
    }

    public function PendingIndex()
    {
        $posts = Post::where('status', 0)->get();
        return view('backend.admin.post.pending',compact('posts'));
    }

    public function postMessage(Request $request,$id)
    {
        $postmessage = $request->postmessage;
        $post = Post::find($id);
        $post->update([
            'postmessage'=>$postmessage
        ]);
        toast('Message Sent!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->back();
    }

    public function acceptReject(Request $request,$id)
    {
        $status = $request->status;
        $approved_by = $request->approved_by;
        $post = Post::find($id);
        $post->update([
            'status' =>$status,
            'approved_by' =>$approved_by,
            'postmessage' => null
        ]);
        toast('Post approved!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->route('pending.index');
    }

}
