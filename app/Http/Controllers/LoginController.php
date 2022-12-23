<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class LoginController extends Controller
{
    //google login
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->getEmail())->first();
            $avatar = $user->getAvatar();
            if($finduser){
                Auth::login($finduser);
                toast('Welcome! '.auth()->user()->name,'success')->autoClose(5000)->width('450px')->timerProgressBar();
                return redirect()->route('dashboard');
            }else{
                $username = substr(str_replace(' ','',strtolower($user->name)), 0, 6).rand(111,999);
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => $username,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
                    'role_id'=> 3,
                    'image' => $avatar,
                ]);
                Auth::login($newUser);
                toast('Welcome to BlogBus!','success')->autoClose(5000)->width('450px')->timerProgressBar();
                return redirect()->route('dashboard');
            }

        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }
}
