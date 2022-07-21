<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomRegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use MongoDB\Driver\Session;

class CustomAuthController extends Controller
{

    public function index(){
        return view('auth.login');
    }

    public function customLogin(LoginRequest $request){
        $request->validated();
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }else{
            return redirect("login");

        }

    }

    public function registration(){
        return view('auth.signup');
    }

    public function customRegistration(CustomRegistrationRequest $request){
            $request->validated();
           $user= User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            Auth::loginUsingId($user->id);
           if(Auth::check()) {

            return view('dashboard');
        }
    }

    public function dashboard(){

        if(Auth::check()){

            return view('dashboard');

        }else{
            return redirect("login");

        }

    }

    public function signOut(Request $request){
        $request->session()->flush();
        $request->session()->regenerateToken();
        Auth::logout();

        return redirect('login');

    }
}
