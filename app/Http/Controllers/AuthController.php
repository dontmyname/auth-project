<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function view_register()
    {
        return view('register');
    }

    function create_user(Request $req)
    {
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        return $this->login_user($req);
    }

    function view_login()
    {
        return view('login');
    }

    function login_user(Request $req)
    {
        $form = $req->only('name', 'password');

        if (Auth::attempt($form)) {
            return redirect('/test');
        }

        return back()->with('error', 'User credentials are not correct');
    }
}
