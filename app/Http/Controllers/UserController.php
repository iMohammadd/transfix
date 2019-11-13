<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.dashboard.user.index', compact('users'));
    }

    public function update(Request $request)
    {
        $users = User::whereIn('id', $request->input('users'))
            ->where('id', '<>', auth()->id());

            $users->update([
                'is_admin'  =>  $request->input('role')
            ]);

        //return $users->get();

        return redirect()->route('user.index');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('admin.dashboard.user.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  'required',
            'password'  =>  'nullable|confirmed'
        ]);

        $input['name']  =  $request->input('name');
        if($request->input('password') != (null || "") ) {
            $input['password']  =   bcrypt($request->input('password'));
        }

        $user = User::find(auth()->id());
        $user->update($input);

        session()->flash('message', "Your profile updated");

        return redirect()->route('dashboard.index');
    }
}
