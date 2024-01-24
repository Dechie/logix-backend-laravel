<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Staff;

class StaffController extends Controller
{
    //
    public function index(Request $request) {
        $id = $request->company;
        $company = Company::find($id);
        $sts = $company->staff;

        return response()->json($sts);
    }
     public function register(Request $request)
    {
        $user = $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|unique:staff',
            'password' => 'required',
        ]);

        $user = new Staff();
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
