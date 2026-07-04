<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function student(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile' => ['required',
            'min:10',],
            'password' => [
            'required',
            'min:8',
            'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).+$/'

        ],
        [
        'mobile.digits' => 'Mobile number must be exactly 10 digits.',
        'mobile.required' => 'Mobile number is required.',
        'password.min' => 'Password must be at least 8 characters.',
        'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
    ]

        ]);
        return $request->all();
    }
   }

