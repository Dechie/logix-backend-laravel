<?php

namespace App\Http\Controllers\Dashboards;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use App\Models\Company;
use App\Models\User;
use App\Models\Staff;
use App\Models\Warehouse;

class AdminDashboardController extends Controller
{
    // TODO: remove this function later on.

    public function index()
    {
        $projects = Project::all();

        return response()->json($projects);
    }

    // TODO: remove this one too.
    

    public function store(Request $request)
    {
        $user = new User();
        $user = Auth::guard('sanctum')->user();

        $validatedData = $this->validate($request, [
            'name' => 'required',
        ]);

        $company = Company::create($validatedData);
        //$company->name = $request->input('name');


        // remember this is donee becuase $user->companies->save($company); 
        // gives an exception: 'BadMethodCallException: Collection::save() doesn't exist
        //$user->companies->add($company);
        // $user->companies->add($company);
        $user->companies()->attach($company);
        // don't remove the above line, it works

        return response()->json([
            'message' => 'succesful',
            'company' => $company,
        ], 201);
        //return response()->json($user);
    }

     public function getCompanies(Request $request) {
        $token = $request->bearerToken();

        $user = Auth::guard('sanctum')->user();

        $companies = $user->companies;
        //dd($companies);
        

        //$list = json_encode($companies);
        //return response($list, 200)
         //   ->header('Content-Type', 'application/json');
         return response()->json($companies, 200);
    }

     public function searchCompany(Request $request) {
        $id = $request->company;

        $company = Company::find($id);

        return $company ?? null;
    }

    
}
