<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandleCors
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedOrigins = [
            'http://localhost:5173', // URL frontend ของคุณ
        ];

        $origin = $request->headers->get('Origin');

        $headers = [
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, PATCH, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With',
        ];

        if (in_array($origin, $allowedOrigins)) {
            $headers['Access-Control-Allow-Origin'] = $origin;
            $headers['Access-Control-Allow-Credentials'] = 'true';
        }

        // Handle preflight request
        if ($request->getMethod() === 'OPTIONS') {
            return response()->json('OK', 200, $headers);
        }

        $response = $next($request);

        foreach ($headers as $key => $value) {
            $response->headers->set($key, $value);
        }

        return $response;
    }
}
