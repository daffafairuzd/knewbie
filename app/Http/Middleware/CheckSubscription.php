<?php

namespace App\Http\Middleware;

use App\Models\User;              
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User|null $user */   
        $user = Auth::user();

        if (! $user || ! $user->hasActiveSubscription()) {
            return redirect()
                ->route('front.pricing')
                ->with('error', 'You need an active subscription to proceed.');
        }

        return $next($request);
    }
}
