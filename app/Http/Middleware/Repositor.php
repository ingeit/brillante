<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

use Closure;

class Repositor
{
    /**
     * Handle an incoming request.
     *Mira vos otro test desde la pc
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // EN TODOS LADOS ES ADMIN. OJO! hasta en la base de datos
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    
public function handle($request, Closure $next)
    {
        if (!Auth::guest()) {
            if ($this->auth->user()->role === 'admin') {
                return $next($request);  
            }
            else{
                if($this->auth->user()->role === 'repositor'){
                    return $next($request); 
                }
            }
        }
        return redirect('/');
    }
}
