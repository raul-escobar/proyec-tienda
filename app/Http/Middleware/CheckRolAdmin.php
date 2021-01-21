<?php

namespace App\Http\Middleware;

use Closure;
use Styde\Html\Facades\Alert;
use Illuminate\Support\Facades\Log;

class CheckRolAdmin
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

       if(auth()->user()->rol_id=='2' || auth()->user()->rol_id=='3') 
        {
            return $next($request);

        }
        
        return redirect('/');
       

    }
}
