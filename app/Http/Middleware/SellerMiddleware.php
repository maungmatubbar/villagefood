<?php

namespace App\Http\Middleware;

use App\Enum\UserTypeEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && auth()->user()->user_type === UserTypeEnum::SELLER){
            return $next($request);
        }else{
            return redirect('/seller/login');
        }
    }
}
