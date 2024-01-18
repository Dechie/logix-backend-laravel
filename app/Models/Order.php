<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\ForTenants;

class Order extends Model
{
    use HasFactory;
    use ForTenants;
    
    public function staff(){
        return $this->belongsTo(Staff::class); 
    }    

    public function stocks() {
        return $this->hasMany(Stock::class);
    } 

    public function originWarehouse() {
        $this->belongsTo(Warehouse::class, 'origin_warehouse_id');
    }

    public function destinationWarehouse() {
        return $this->belongsTo(Warehouse::class, 'destination_warehouse_id');
    }
}
