<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class CanQuery
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
        $setting = Cache::get('setting');
        $ip = $request->ip();
        if(!$setting->is_open) {
            return redirect()->route('index')->withErrors(['error' => '系统维护中，请稍后再试']);
        }
        
        if($setting->frequency) {
            if(Cache($ip)) {
                return redirect()->route('index')->withErrors(['error' => '查询太频繁了，稍后再试']);
            }
            Cache::put($ip, 1, now()->addSeconds($setting->frequency));
        }

        //ip黑名单
        if($setting->ip_blacklist) {
            if(in_array($ip, explode(',', $setting->ip_blacklist))) {
                return redirect()->route('index')->withErrors(['error' => '你已被禁止查询']);
            }
        }
        return $next($request);
    }
}
