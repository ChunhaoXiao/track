<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\ServerBag;

class WriteConfigToCache
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Cache::has('setting')) {
            Cache::put('setting', Setting::first());
        }
        return $next($request);
    }
}
