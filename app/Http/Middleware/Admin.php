<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (!Auth::check()){
            return redirect()->route('login');
        }
//        role 1==admin
        if (Auth::user()->role=='admin'){
            return $next($request);
        }
//        role 2==buyer
        if (Auth::user()->role=='buyer'){
            return redirect()->route('buyer.index');
        }
        //        role 2==seller
        if (Auth::user()->role=='seller'){
            return redirect()->route('seller.index');
        }

        //        role 4==supplier
        if (Auth::user()->role=='supplier'){
            return redirect()->route('supplier.index');
        }
        //        role 2==buyer
        if (Auth::user()->role=='procurement'){
            return redirect()->route('buyer.index');
        }
        //        role 2==buyer
        if (Auth::user()->role=='accounts'){
            return redirect()->route('buyer.index');
        }
        //        role 2==buyer
        if (Auth::user()->role=='warehouse'){
            return redirect()->route('buyer.index');
        }


    }
}
