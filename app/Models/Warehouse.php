<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\ForTenants;

class Warehouse extends Model
{
    use HasFactory;
    use ForTenants;
     protected $fillable = [
        'name',
        'address',
    ];
   
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function stocks() {
        return $this->hasMany(Stock::class);
    }

    // public function orders() {
    //     return $this->hasMany(Order::class);
    // }
}