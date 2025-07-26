<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\VisitorLog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Queue;
use App\Jobs\LogVisitorJob;

class LogVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        // تجاهل لوحة الإدارة
        if ($request->is('admin/*')) {
            return $next($request);
        }

        // Rate limiting لتجنب تسجيل نفس IP بشكل متكرر
        $ip = $request->ip();
        $cacheKey = "visitor_log_{$ip}";
        
        // إذا تم تسجيل هذا IP في آخر 5 دقائق، تجاهل
        if (Cache::has($cacheKey)) {
            return $next($request);
        }

        // بيانات الزيارة
        $userAgent = $request->userAgent();
        $page = $request->path();
        $visitedAt = now();
        $country = null;
        $city = null;

        // استخدام Queue لتسجيل الزيارة في الخلفية
        Queue::push(new LogVisitorJob([
            'ip' => $ip,
            'country' => $country,
            'city' => $city,
            'user_agent' => $userAgent,
            'page' => $page,
            'visited_at' => $visitedAt,
        ]));

        // Cache لمدة 5 دقائق لتجنب التسجيل المتكرر
        Cache::put($cacheKey, true, 300);

        return $next($request);
    }
}
