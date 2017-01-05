<?php

namespace App\Http\Middleware;

use Closure;

class BladeTagsFix
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
        \Blade::setContentTags('[[', ']]');
        \Blade::setEscapedContentTags('[[[', ']]]');
        return $next($request);
    }
}
