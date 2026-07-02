<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {

        session([
            'user' => $user->name,
            'user_id' => $user->id
        ]);

        return redirect('/dashboard');
    }

    return back()->with('error', 'Invalid Email or Password');
}

    public function dashboard()
    {

        if(!session()->has('user')){
            return redirect('/');
        }

        return view('dashboard');

    }

    public function logout()
    {

        session()->forget('user');

        return redirect('/');

    }

}
