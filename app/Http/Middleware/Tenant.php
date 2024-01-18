<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Tenant\Manager;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Tenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tenant = $this->resolveTenant($request->company);

        

        // if (!auth()->user()->companies->contains('id', $tenant->id)) {
        //     return response(['fail'], 302);
        // }

        $this->registerTenant($tenant);
        return $next($request);

    }

    public function registerTenant($tenant)
    {
        app(Manager::class)->setTenant($tenant);
    }

    public function resolveTenant($id)
    {
        return Company::find($id);
    }
}
