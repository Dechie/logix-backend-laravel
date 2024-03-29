<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Driver;

class DriverController extends Controller
{
    //
    public function register(Request $request)
    {
        $user = $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|unique:drivers',
            'password' => 'required',
        ]);

        $user = new Driver();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        //$user->password = $request->input('password');
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
