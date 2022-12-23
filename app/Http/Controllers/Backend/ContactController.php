<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.admin.contact.index',compact('contacts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::get();
        return view('frontend.layouts.contact',compact('contacts'));
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
            'body'=>'required'
        ]);

        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'body'=>$request->body,
        ]);
        toast('Message Sent!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->back();

    }
    public function destroy($id)
    {

        $contact = Contact::find($id);
        $contact->delete();
        toast('Message deleted!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->back();
    }
}
