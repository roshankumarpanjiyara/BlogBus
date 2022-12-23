<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Alert;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('backend.admin.user.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.user.index');
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
            'username'=>'required|string|min:5|max:20|alpha_dash|unique:users,username|unique:admins,username',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string',
            'role_id'=>'required',
        ]);

        $data = $request->all();
        $data['password']= Hash::make($request->password);
        User::create($data);
        toast('User created!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->route('users.index');
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
        $username = User::where('name',$id)->first();
        $userId = $username->id;
        $user = User::find($userId);
        return view('backend.admin.user.index',compact('user','userId'));
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
            'name'=>'required',
            'email'=>'required|string|email|max:255|unique:users,email,'.$id,

            'role_id'=>'required',
        ]);
        $data = $request->all();
        $user = User::find($id);
        if($request->password){
            $password = $request->password;
        }else{
            $password = $user->password;
        }
        $data['password']= $password;
        $user->update($data);
        toast('User updated!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->route('users.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::find($id);
        $filename = $user->profile_photo_url;
        $user->delete();
        unlink($filename);
        // $post = Post::find($user->id);
        // $Postfilename = $post->image;
        // $post->delete();
        // \Storage::delete($Postfilename);
        toast('User deleted!','success')->autoClose(3000)->width('450px')->timerProgressBar();
       return redirect()->route('users.index');

    }

    public function ProfileView(){
    	$id = Auth::user()->id;
    	$user = User::find($id);

    	return view('user.userprofile.edit',compact('user'));
    }

    public function ProfileEdit(){
        $user= User::find(auth()->user()->id);
        $id = Auth::id();
        $userId = Auth::user()->id;
        //  dd(auth()->user()->id);
        // dd($id);
        // Check for correct user
        if($userId !==$id){
            return redirect('/dashboard');
        }
        return view('profile.update-profile-information-form',compact('user'));
    }

    public function ProfileUpdate(Request $request){
         $this->validate($request,[
            'name'=>'required',
            'profile_photo_path'=>'mimes:jpeg,jpg,png',
        ]);
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
    	$data->mobile_number = $request->mobile_number;
    	$data->designation = $request->designation;
    	$data->experience = $request->experience;
        if($request->file('profile_photo_path')){
            $image_path = $data->profile_photo_path;
            if($image_path!=null){
                unlink($image_path);
            }
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('storage/profile-photos/'.$name_gen);
            $image_url = 'storage/profile-photos/'.$name_gen;
        }else{
            $image_url = $data->profile_photo_path;
        }
        $data['profile_photo_path']=$image_url;
        if($request->delete_photo == 1){
            $image_path = $data->profile_photo_path;
            unlink($image_path);
            $data['profile_photo_path']=NULL;
        }
        $data->save();
        toast('User updated!','success')->autoClose(3000)->width('450px')->timerProgressBar();
        return redirect()->back();
    }

    public function PasswordView(){
        $user= User::find(auth()->user()->id);
        $id = Auth::id();
        $userId = Auth::user()->id;
        //  dd(auth()->user()->id);
        // dd($id);
        // Check for correct user
        if($userId !==$id){
            return redirect('/dashboard');
        }
        return view('profile.update-password-form',compact('user'));
    }

    public function PasswordChange(Request $request){
        $this->validate($request,[
           'current_password' => 'required',
           'password' => 'required|confirmed',
       ]);
       $hashedPassword = Auth::user()->password;
       if(Auth::user()->google_id){
        if ($request->current_password == $hashedPassword) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            // auth()->guard('web')->logout();
            toast('Password updated!','success')->autoClose(3000)->width('450px')->timerProgressBar();
            return redirect()->route('login');
        }else{
             toast('Something went wrong!','error')->autoClose(3000)->width('450px')->timerProgressBar();
            return redirect()->back();
        }
       }else{
            if (Hash::check($request->current_password,$hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                // auth()->guard('web')->logout();
                toast('Password updated!','success')->autoClose(3000)->width('450px')->timerProgressBar();
                return redirect()->route('login');
            }else{
                toast('Something went wrong!','error')->autoClose(3000)->width('450px')->timerProgressBar();
                return redirect()->back();
            }
       }
    } // End Metod
}
