<?php

namespace CollingMedia\Laravel\Http\Middleware;

use Cache;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaravelCacheAfter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if (config('laravel-cache.enable', false)) {
            $tail = (\Auth::user() ? md5(\Auth::user()->myCompanies) : '');
            $request_uri = $request->url() . '?' . http_build_query($request->except('user')) . '_' . $tail;
            $key = 'route_' . Str::slug($request_uri);
            if (! Cache::has($key)) {
                Cache::put($key, $response->getContent(), config('laravel-cache.length', 60));
            }
        }
        return $response;
    }
}
