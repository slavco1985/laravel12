<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\AppSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class IsEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $app_setting = AppSettings::firstOrNew();
        if($app_setting->email_activation){
            if (!$request->user()->hasVerifiedEmail()) {
                return Redirect::guest(URL::route('verification.notice'));
            }
        }
        return $next($request);
    }
}
