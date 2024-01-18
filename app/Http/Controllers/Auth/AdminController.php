<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function register(Request $request)
    {
        $user = $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->password = $request->input('password');
        $user->password = Hash::make($request['password']);

        $user->save();

        $token = $user->createToken('AuthToken')->plainTextToken;

        return response()->json([
            'message' => 'succesful',
            'token' => $token,
            'id' => $user->id,
        ], 201);
    }
}
