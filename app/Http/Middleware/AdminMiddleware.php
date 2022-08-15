<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){

            if(Auth::user()->role == 1){
                return $next($request);
                // return redirect('/admin/home')->with('message', 'Welcome Admin !');
            }else{
                return redirect('/mahasiswa/index')->with('message', 'Akses User Ditolak !');
            }

        }else{
            return redirect('/login')->with('message', 'Silahkan Login !');
        }

        return $next($request);
        
    }
}
