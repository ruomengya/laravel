<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class CheckLogin
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
        if(isset($_COOKIE['uid']) && isset($_COOKIE['token'])){
            //验证token
            $key = 'token:'.$_COOKIE['uid'];
            $token = Redis::hget($key , 'web');
            if($_COOKIE['token'] == $token){
                $request->attributes->add(['is_login' => 1]);
            }else{
                $request->attributes->add(['is_login' => 0]);
            }
        }else{
            $request->attributes->add(['is_login' => 0]);
        }


        return $next($request);
    }
}
