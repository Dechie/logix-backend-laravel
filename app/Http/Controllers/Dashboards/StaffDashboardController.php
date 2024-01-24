<?php

namespace App\Http\Controllers\Dashboards;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\Company;

class StaffDashboardController extends Controller
{
    //
    public function applyToCompany(Request $request) {
        $id = $request->staff;
        //dd($id);

        $staff = Staff::find($id);
        
        $company = Company::find($request->input('company_id'));
        //dd($company);
       
        //$company->staff()->attach($staff);
        $staff->companies()->attach($company);

        return response()->json([
            'message' => 'success',
            'company' => $company->id, 
            'staff' => $staff->id,
        ], 200);
    }

    
}
