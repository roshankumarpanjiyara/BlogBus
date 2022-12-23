<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::latest()->where('username',auth()->user()->username)->get();
        return view('backend.user.comment.index',compact('comments'));
    }
    public function adminindex()
    {
        $comments = Comment::latest()->get();
        return view('backend.admin.comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.layouts.blog.show');
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
            'name'=>'required',
            'email'=>'required',
            'body'=>'required',
        ]);
        Comment::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'body'=>$request->body,
            'post_id'=>$request->post_id,
            'username'=>$request->username,
        ]);
        toast('Comment Posted!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if(auth()->user()->username !==$comment->username){
            return redirect('/userposts')->with('error', 'Unauthorized Page');
        }
        $comment->delete();
        toast('Comment deleted!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->back();
    }

    public function admindestroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        toast('Comment deleted!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->back();
    }
}
