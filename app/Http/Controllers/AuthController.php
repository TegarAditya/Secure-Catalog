<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function indexlogin()
    {
        //return view login
        return view('auth.login');
    }

    public function indexregister()
    {
        //return view login
        return view('auth.register');
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        } else {
            //auth user from database
            $credentials = $request->only('email', 'password');
            $user = User::where([
                'email' => $credentials['email'],
                'password' => md5($credentials['password'])
            ])->first();
            if ($user) {
                Auth::login($user);
                if ($user->role == 'admin') {
                    return redirect()->route('dashboard');
                } else if ($user->role == 'superadmin') {
                    return redirect()->route('laporan');
                } else if ($user->role == 'user') {
                    return redirect()->route('landingpage');
                }
            } else {
                //redirect to login
                return redirect('login');
            }
        }
        return redirect('login');
    }

    public function register(Request $request)
    {
        //return view register
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|min:8|confirmed',
            'password' => 'required|min:3',
            'confirm_password' => 'required|min:3|same:password',
            'role' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        } else {
            //auth user from database
            $credentials = $request->only('name', 'email', 'password', 'role');
            $user = User::create([
                'name' => $credentials['name'],
                'email' => $credentials['email'],
                'password' => md5($credentials['password']),
                'role' => $credentials['role']
            ]);
            if ($user) {
                // Auth::login($user);
                // if ($user->role == 'admin') {
                //     return redirect()->route('dashboard');
                // } else if ($user->role == 'superadmin') {
                //     return redirect()->route('laporan');
                // } else if ($user->role == 'user') {
                //     return redirect()->route('dashboard');
                // }
                return redirect('login');
            } else {
                //redirect to login
                return redirect('register');
            }
        }

        return redirect('register');
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
