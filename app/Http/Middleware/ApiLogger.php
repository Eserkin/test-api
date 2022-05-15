<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Apilog\DBLogger;

class ApiLogger
{
    protected $logger;

    public function __construct(DBLogger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        return $response;
    }

    public function terminate($request, $response)
    {
        $this->logger->saveLogs($request, $response);
    }
}
