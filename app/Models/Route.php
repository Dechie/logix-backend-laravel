<?php

namespace App\Models;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory, ForTenants;

    protected $fillable = [
        'name',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
