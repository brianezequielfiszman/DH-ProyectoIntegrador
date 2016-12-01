<?php

namespace Manija\Http\Middleware;

use Closure;
use User;

class TeacherAndAdminMiddleware
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
         if ($request->user()->category->description == 'parent')
             return redirect('home');

         return $next($request);
     }
}
