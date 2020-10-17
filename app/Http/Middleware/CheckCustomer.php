<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCustomer
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
        if($this->checkCustomer()) {
            return $next($request);
        }
        return response()->json("Access denied");
    }
    public function checkCustomer(){
        if(Auth::user()->role == "customer"){
            return true;
        }
        return false;
    }
}
