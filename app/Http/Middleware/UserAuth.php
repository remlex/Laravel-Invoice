<?php

// namespace App\Http\Middleware;
 
// use Closure;
// use Illuminate\Support\Facades\Auth;
 
// class UserAuth
// {
    
//     public function handle($request, Closure $next, $guard = null)
//     {
 
//         if (Auth::guard($guard)->guest()) {
//             if ($request->ajax()) {
//                 return response('Unauthorized.', 401);
//             } else {
//                 return redirect()->guest('admin.admin_login');
 
//             }
//         }
 
//         if(Auth::guard($guard)->guest()==false && Auth::user()->roles!='user' && Auth::user()->status!=0){
//             Auth::logout();
//             return redirect()->guest('admin.admin_login');
//         }
//         return $next($request);
//     }
// } 