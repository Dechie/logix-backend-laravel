<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
    //
    public function index()
    {
        //$comps = [
        //   'name' => 'company1',
        //  'location' => 'san francisco'
        //];
        return response()->json(Route::all());
        //return response()->json($comps);
    }

    public function store(Request $request)
    {
        //dd($request->company);
        $query = Route::create([
            'name' => $request->name,
        ]);

        $sql = $query->toSql();
        //dd($sql);

        return response()->json(['sql' => $sql]);
    }

    public function destroy(Request $request)
    {
    }
}
