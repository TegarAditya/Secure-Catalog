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
        return view('login');
    }
    
    public function indexregister()
    {
        //return view login
        return view('login');
    }
    
    public function login(Request $request)
    {
        //return view login
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        //auth user from database with validator
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
                    return redirect('dashboard.admin');
                } else if ($user->role == 'superadmin') {
                    return redirect('dashboard.superadmin');
                } else if ($user->role == 'user') {
                    return redirect('dashboard.user');
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
            'email' => 'required|email|exists:users|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => '(admin|superadmin|user)|required'
        ]);
        if ($validator->fails()) {
            return redirect('resgister')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            //auth user from database
            $credentials = $request->only('email', 'password', 'role');
            $user = User::create([
                'email' => $credentials['email'],
                'password' => md5($credentials['password']),
                'role' => $credentials['role']
            ]);
            if ($user) {
                Auth::login($user);
                if ($user->role == 'admin') {
                    return redirect('dashboard.admin');
                } else if ($user->role == 'superadmin') {
                    return redirect('dashboard.superadmin');
                } else if ($user->role == 'user') {
                    return redirect('dashboard.user');
                }
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
