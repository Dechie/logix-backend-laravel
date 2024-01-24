<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $primary_key = 'id';
    protected $fillable = [
        'name',
        'location'
    ];

    public function staff() {
        return $this->belongsToMany(Staff::class);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function routes() {
        return $this->hasMany(Route::class);
    }
     public function trucks() {
        return $this->hasMany(Truck::class);
    }

    public function warehouses(){
        return $this->hasMany(Warehouse::class);
    }

    // public function warehouseAppliedStaff() {
    //     return $this->hasMany(Staff::class, 'staff_id');
    // } 

    // public function staff() {
    //     return $this->belongsToMany(Staff::class, 'company_staff', 'company_id', 'staff_email');
    // }
}
