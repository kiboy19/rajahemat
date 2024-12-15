<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|max:50',

        ]);
        if(Auth::attempt($request->only('email', 'password'), $request->remember)){
            if(Auth::user()->role == 'user' ){
            return redirect('/user/user');
        }else{
            return redirect('/admin/dashboard');
        }
        }
        return back()->with('failed', 'Email atau password salah');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|max:50|min:8',
            'confirm_password' => 'required|max:50|min:8|same:password',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), 
        ]);
    
        Auth::login($user); 
        return redirect('/'); 
    }

    public function google_redirect(){

        return Socialite::driver('google')->redirect();

    }

    public function google_callback()
{

    $googleUser = Socialite::driver('google')->user();
    

    $user = User::where('email', $googleUser->email)->first();
    

    if (!$user) {
        $user = User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => bcrypt(Str::random(16)),
            'role' => 'user',
        ]);
    }

 
    Auth::login($user);
    if($user->role == 'user') {

        return redirect('/user/user');
    }else{
        return redirect('/admin/dashboard');
    }
}


    public function logout(){
        Auth::logout(Auth::user());
        return redirect(('/'));
    }
}