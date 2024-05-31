<?php

namespace App\Http\Middleware;

use App\Enum\UserTypeEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApproveSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->user_type === UserTypeEnum::SELLER && \auth()->user()->is_approved_seller ===1 ){
            return $next($request);
        }else{
            return redirect('/seller/dashboard');
        }
    }
}
