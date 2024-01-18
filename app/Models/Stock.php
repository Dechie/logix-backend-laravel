<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\ForTenants;
use App\Models\Order;

class Stock extends Model
{
    use ForTenants;
    use HasFactory;
    protected $fillable = [
        'quantity',
        'price',
        'arrived_at',
        'status',
    ];

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function warehouse(){
        return $this->belongsToMany(Warehouse::class);
    }
    
    public function order() {
        return $this->belongsTo(Order::class);
    }
}