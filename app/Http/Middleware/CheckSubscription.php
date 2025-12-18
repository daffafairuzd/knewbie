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

            // Simpan course yang sedang dicoba ke session (kalau ada)
            // Dari route parameter {course:slug}
            $courseParam = $request->route('course');

            if ($courseParam) {
                // Kalau pakai route model binding, ini instance Course
                if (is_object($courseParam) && method_exists($courseParam, 'getAttribute')) {
                    $courseSlug = $courseParam->slug;
                } else {
                    // Kalau cuma slug string biasa
                    $courseSlug = (string) $courseParam;
                }

                // Simpan di session untuk dipakai di checkout_success
                session(['intended_course_slug' => $courseSlug]);
            }

            return redirect()
                ->route('front.pricing')
                ->with('error', 'You need an active subscription to proceed.');
        }

        return $next($request);
    }
}
