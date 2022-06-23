<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function loginpage()
    {
        return view('login/login');
    }
    function login(Request $request)
    {
        $validate = $request->validate([
            'useremail' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect('/transaksi');
        }
        /*
        return back()->withErrors([
            'errormsg' => 'Invalid Credential'
        ]);
        */
        return redirect('/login');
    }
    function registerpage()
    {
        return view('signup/register');
    }
    function register(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'useremail' => 'required|unique:users,useremail|email',
            'password' => 'required',
            'userrepeatpassword' => 'same:password',
            'userdob' => 'required'
        ]);
        $user = new User();
        $user->username = $validate['username'];
        $user->useremail = $validate['useremail'];
        $user->password = bcrypt($validate['password']);
        $user->userdob = $validate['userdob'];
        $user->save();
        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
