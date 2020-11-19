<?php

namespace App\Http\Middleware;

use App\Http\Controllers\BalanceController;
use Closure;
use App\UserMeta;

class UpdateUserMeta
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $balanceUpdate = new BalanceController();
        $request = $balanceUpdate->updateUserMeta($request);
        return $next($request);
    }

    
}
