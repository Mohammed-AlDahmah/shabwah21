<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\VisitorLog;
// use Torann\GeoIP\Facades\GeoIP; // إذا كنت ستستخدم مكتبة geoip

class LogVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        // تجاهل لوحة الإدارة
        if ($request->is('admin/*')) {
            return $next($request);
        }

        // بيانات الزيارة
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $page = $request->path();
        $visitedAt = now();
        $country = null;
        $city = null;

        // إذا كانت مكتبة geoip متوفرة
        // try {
        //     $geo = geoip($ip);
        //     $country = $geo->country ?? null;
        //     $city = $geo->city ?? null;
        // } catch (\Exception $e) {}

        VisitorLog::create([
            'ip' => $ip,
            'country' => $country,
            'city' => $city,
            'user_agent' => $userAgent,
            'page' => $page,
            'visited_at' => $visitedAt,
        ]);

        return $next($request);
    }
}
