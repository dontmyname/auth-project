<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        return view('welcome');
    }

    function show()
    {
        return view('edit-user');
    }

    function update_user(Request $req)
    {
        User::find(Auth::id())->update([
            'name' => $req->name,
            'email' => $req->email
        ]);

        if ($req->password != '') {
            User::find(Auth::id())->update([
                'password' => Hash::make($req->password)
            ]);
        }

        return redirect('/admin/');
    }
}
