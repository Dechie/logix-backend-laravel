<?php

namespace App\Tenant\Observers;

use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    protected $tenant;
    public function __construct(Model $tenant)
    {
        $this->tenant = $tenant;
    }

    public function creating(Model $model)
    {
        //dd($model);
        $boolll = $this->tenant->id == null;
        //print('is the tenant id null? ' . $this->tenant->id);

        $foreignKey = $this->tenant->getForeignKey();
        if (!isset($model->{$foreignKey})) {
            $model->setAttribute($foreignKey, $this->tenant->id);
        }
    }
}
