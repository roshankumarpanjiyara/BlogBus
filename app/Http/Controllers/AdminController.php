<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;

use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;

use Laravel\Fortify\Contracts\LoginViewResponse;
// use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Responses\LoginResponse;
use App\Http\Responses\LogoutResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{
    use ValidatesRequests;
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function loginForm(){
        return view('auth.login',['guard' => 'admin']);
    }

    /**
     * Show the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LoginViewResponse
     */
    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            toast('Welcome! ','success')->autoClose(5000)->width('450px')->timerProgressBar();
            return app(LoginResponse::class);
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminIndex()
    {
        $admins = Admin::all();
        return view('backend.admin.user.admin_index',compact('admins'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminCreate()
    {
        return view('backend.admin.user.admin_index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AdminStore(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required|string|min:5|max:20|alpha_dash|unique:admins|unique:users',
            'email'=>'required|string|email|max:255|unique:admins',
            'password'=>'required|string',
            'role_id'=>'required',
        ]);

        $data = $request->all();
        $data['password']= Hash::make($request->password);
        Admin::create($data);
        toast('Admin created!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->route('admins.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminEdit($id)
    {
        $username = Admin::where('name',$id)->first();
        $userId = $username->id;
        $admin = Admin::find($userId);
        return view('backend.admin.user.admin_index',compact('admin','userId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdate(Request $request, $id)
    {
         $this->validate($request,[
            'name'=>'required',
            'email'=>'required|string|email|max:255|unique:admins,email,'.$id,

            'role_id'=>'required',
        ]);
        $data = $request->all();
        $admin = Admin::find($id);
        if($request->password){
            $password = $request->password;
        }else{
            $password = $admin->password;
        }
        $data['password']= $password;
        $admin->update($data);
        toast('Admin updated!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->route('admins.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminDelete($id)
    {
        $admin = Admin::find($id);
        $filename = $admin->profile_photo_url;
        $admin->delete();
        unlink($filename);
        // $post = Post::find($user->id);
        // $Postfilename = $post->image;
        // $post->delete();
        // \Storage::delete($Postfilename);
        toast('Admin deleted!','success')->autoClose(3000)->width('450px')->timerProgressBar();
       return redirect()->route('admins.index');

    }

    public function AdminProfile(){
    	$id = Auth::user()->id;
    	$admin = Admin::find($id);

    	return view('backend.admin.profile.show',compact('admin'));
    }

    public function AdminEditProfile(){
        $admin= Admin::find(auth()->user()->id);
        $id = Auth::id();
        $userId = Auth::user()->id;
        //  dd(auth()->user()->id);
        // dd($id);
        // Check for correct user
        if($userId !==$id){
            return redirect('/admin/dashboard');
        }
        return view('backend.admin.profile.update-profile-information-form',compact('admin'));
    }

    public function AdminStoreProfile(Request $request){
         $this->validate($request,[
            'name'=>'required',
            'profile_photo_path'=>'mimes:jpeg,jpg,png',
        ]);
        $data = Admin::find(Auth::user()->id);
        $data->name = $request->name;
    	$data->mobile_number = $request->mobile_number;
    	$data->designation = $request->designation;
    	$data->experience = $request->experience;
        if($request->hasFile('profile_photo_path')){
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
        toast('Profile updated!','success')->autoClose(3000)->width('450px')->timerProgressBar();
        return redirect()->back();
    }

    public function AdminPasswordProfile(){
        $admin= Admin::find(auth()->user()->id);
        $id = Auth::id();
        $userId = Auth::user()->id;
        //  dd(auth()->user()->id);
        // dd($id);
        // Check for correct user
        if($userId !==$id){
            return redirect('/dashboard');
        }
        return view('backend.admin.profile.update-password-form',compact('admin'));
    }

    public function AdminUpdatePassword(Request $request){
        $this->validate($request,[
           'current_password' => 'required',
           'password' => 'required|confirmed',
       ]);
       $hashedPassword = Auth::user()->password;
       if(Auth::user()->google_id){
        if ($request->current_password == $hashedPassword) {
            $user = Admin::find(Auth::id());
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
                $user = Admin::find(Auth::id());
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
    } // End Method
}
