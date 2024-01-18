<?php

namespace App\Tenant\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{

    protected $tenant;

    public function __construct(Model $tenant)
    {
        $this->tenant = $tenant;
    }
    public function apply(Builder $builder, Model $model)
    {
        $foreignKey = $this->tenant->getForeignKey();
        return $builder->where($foreignKey, '=', $this->tenant->id);
    }
}
