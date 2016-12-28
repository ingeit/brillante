<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

use Closure;

class Cajero
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
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
                if($this->auth->user()->role === 'cajero'){
                    return $next($request); 
                }
            }
        }
        return redirect('/');
    }
}
