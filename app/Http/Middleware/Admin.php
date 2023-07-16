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
       if(true){
          if(Auth::user()->isAdmin())
          {
              return $next($request);
          }
       }
     }
  
     abort(403);
  }
}
