<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    function index()
    {
        $user = User::all();
        return view('listuser', ['user' => $user]);
    }
    function show($id)
    {
        $user = User::find($id);
        return view('user.show', ['user' => $user]);
    }
    function edit($id)
    {
        $user = User::find($id);
        return view('edituser', ['user' => $user]);
    }
    function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
            ]
        ));
        return redirect('user');
    }
    function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user');
    }
}
