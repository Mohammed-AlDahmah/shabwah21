<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class OptimizePerformance
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // إضافة headers لتحسين الأداء
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        
        // تحسين cache للصفحات الثابتة
        if ($request->isMethod('GET') && !$request->is('admin/*')) {
            // Cache للصفحات الرئيسية
            if ($request->is('/') || $request->is('news/*') || $request->is('category/*')) {
                $response->headers->set('Cache-Control', 'public, max-age=300, s-maxage=600');
            } else {
                $response->headers->set('Cache-Control', 'public, max-age=1800');
            }
        }

        // تحسين compression
        $response->headers->set('Vary', 'Accept-Encoding');
        
        // تحسين security headers
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');

        return $response;
    }
} 