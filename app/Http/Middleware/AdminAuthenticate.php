<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate{
    public function handle(Request $request, Closure $next): Response{
        if(!Auth::user()->isAdmin)
            abort(403); // or any proper response// pass over next middleware
        return $next($request); 
    }
}