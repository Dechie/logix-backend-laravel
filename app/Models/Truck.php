<?php

namespace App\Models;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;
    use ForTenants;
    
    protected $fillable = [
        'name',
        'mileage',
        'fuel_consumption'
    ];
    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function driver() {
        return $this->belongsTo(Driver::class);
    }
}