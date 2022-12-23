<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\permissionTrait;
use Illuminate\Support\Facades\Auth;

class HasPermission
{
    use permissionTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->hasPermission();
        return $next($request);
    }
}
