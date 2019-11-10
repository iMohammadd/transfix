<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate( [
            'email'     =>  'required|email',
            'password'  =>  'required'
        ]);

        if(! Auth::attempt([
            'email'     =>  $request->input('email'),
            'password'  =>  $request->input('password'),
            'banned'    =>  0
        ], $request->exists('remember'))) {
            return redirect()->back()->withErrors('Authorization Failed');
        } else {
            return redirect('/');
        }
    }

    public function logout()
    {
        \auth()->logout();

        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        $request->validate( [
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users,email',
            'password'  =>  'required|confirmed'
        ]);

        $user = User::create([
            'name'      =>  $request->input('name'),
            'email'     =>  $request->input('email'),
            'password'  =>  bcrypt($request->input('password')),
            'is_admin'  =>  $request->has('is_admin')
        ]);

        return redirect('/');
    }
}
