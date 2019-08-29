<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class test_newCheckURL
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
        $url = url()->full();
        $arr_url = explode('/', $url);
        $url = end($arr_url);
        // $patt = '/^(search\?q\=).+$/';
        // if(!preg_match($patt, $url)) abort(404);
        $patt = 'search?q=1234';
        if($url != $patt) abort(404);
        // 
        // print_r($request);
        // echo url()->full();
        
        return $next($request);
    }
}
