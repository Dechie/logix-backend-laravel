<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



// use Illuminate\Contracts\Auth\MustVerifyEmail;


class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

     public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function warehouse(){
        return $this->hasOne(Warehouse::class);
    }

    // public function appliedCompany() { 
    //     return $this->belongsTo(Company::class, 'staff_id', 'id', 'staff_company');
    // }

    // public function warehouseApplied() {
    //     return $this->belongsTo(Company::class, 'company_id');
    // }
 

    // staff doesn't necessarily need to be related to stock
    // public function stock() {
    //     return $this->hasMany(Stock::class);
    // }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}