<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if ($email == "admin@gmail.com" && $password == "123456") {
            return "Login Successful";
        } else {
            return "Invalid Email or Password";
        }
    }
}
