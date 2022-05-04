<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Options
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
        $actions = $request->get('actions');
        $about_what = $request->get('about_what');

        if ($actions == "" || $about_what == "") {
            return redirect('/activities');
        }
        // return $next($request);
    }
}
