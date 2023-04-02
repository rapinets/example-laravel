<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ForgotUserEmailJob;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required']
        ]);

        if(auth('web')->attempt($data)) {
            return redirect(route('admin.posts'));
        }

        return redirect(route('login'))->withErrors(['email' => 'User not found or data entered incorrectly']);
    }

    public function logout()
    {
        auth('web')->logout();

        return redirect(route('posts.index'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showForgotForm()
    {
        return view('auth.forgot');
    }

    public function forgot(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string', 'exists:users'],
        ]);

        $user = User::where(['email' => $data['email']])->first();

        $password = uniqid();

        $user->password = bcrypt($password);
        $user->save();

        Mail::to($user)->send(new ForgotPassword($password));

        return redirect(route('posts.index'));
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'unique:users,email', 'confirmed'],
            'password' => ['required', 'min:4', 'max:10', 'confirmed']
        ]);

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        if($user) {
            
            auth('web')->login($user);
        }

        return redirect(route('admin.posts'));
    }
}
