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
}
