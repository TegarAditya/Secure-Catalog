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
        return view('user.index', ['user' => $user]);
    }
    function show($id)
    {
        $user = User::find($id);
        return view('user.show', ['user' => $user]);
    }
    function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }
    function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->validate());
        return redirect('user');
    }
    function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user');
    }
}
