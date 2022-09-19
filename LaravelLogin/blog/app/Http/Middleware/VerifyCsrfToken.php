<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure;

class VerifyCsrfToken extends Middleware
{

    public function handle($request, Closure $next) {
        $response = $next($request);
        $request->header('P3P', 'CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi CONi HIS OUR IND CNT"');
        return $response;
    }

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // csrf 해제
    ];
}
