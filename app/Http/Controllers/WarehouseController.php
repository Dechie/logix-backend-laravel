<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

use App\Models\Warehouse;
use App\Models\Staff;

class WarehouseController extends Controller
{
    //
    use HasFactory, ForTenants;
    public function index()
    {
        $warehouses = Warehouse::all();
        return response()->json(Warehouse::all());
    }

    public function store(Request $request)
    {
        //dd($request->input('location'));
        $query = Warehouse::create([
            'name' => $request->input('name'),
            'address' => $request->input('location'),
        ]);

        $sql = $query->toSql();

        return response()->json(['sql' => $sql]);
    }
    public function staffToWarehouse(Request $request)
    {
        $staff_id = $request->input('staff_id');
        $staff = Staff::find($staff_id);

        $warehouse_id = $request->input('warehouse_id');
        $warehouse = Warehouse::find($warehouse_id);

        //dd($warehouse);

        $warehouse->staff()->associate($staff);

        return response()->json([
            'message' => 'successful',
            'details' => 'staff ' . $staff->name . ' associated with warehouse ' . $warehouse->name,
        ]);
    }
}
