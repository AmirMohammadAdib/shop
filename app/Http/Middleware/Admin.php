<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;

class Admin extends Middleware
{
  public function handle($request, Closure $next, ...$guards)
  {
     if (Auth::check())
     {
       if(ip() == '78.157.42.115' OR ip() == '185.11.89.114'){
          if(Auth::user()->isAdmin())
          {
              return $next($request);
          }
       }
     }
  
     abort(403);
  }
}
