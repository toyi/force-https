<?php

namespace Toyi\ForceHttps;

use Closure;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->secure() && config('force-https.force-https')) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
