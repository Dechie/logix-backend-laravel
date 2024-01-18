<?php

namespace App\Models;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use ForTenants;

    protected $fillable = [
        'name'
    ];
}
