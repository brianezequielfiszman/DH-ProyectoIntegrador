<?php

namespace Manija\Http\Middleware;

use Closure;

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
         if ($request->user()->category->id == 3)
             return redirect('home');

         return $next($request);
     }
}