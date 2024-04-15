<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Formlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('role_id')){
            $role_id = session()->get('role_id');
            if($role_id == 1 && $request->path() != 'dash'){
                return redirect('/dash');
            }
           
            elseif($role_id == 2 && $request->path() != 'teach'){
                return redirect('/teach');
            }
            elseif($role_id == 3 && $request->path() != 'monitor'){
                return redirect('/monitor');
            }
            elseif($role_id == 4 && $request->path() != 'stu'){
                return redirect('/stu');
            }
        } else {
            return redirect('/login')->with('error', 'Please login first');
        }
        
        return $next($request);
    }
}
