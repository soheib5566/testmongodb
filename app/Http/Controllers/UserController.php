<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function store_user(Request $request)
    {


        $attributes = $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:4|max:30',

        ]);

        $attributes['password'] = bcrypt($attributes['password']);


        return User::create($attributes);
        //    dd($request->all());
    }
}
