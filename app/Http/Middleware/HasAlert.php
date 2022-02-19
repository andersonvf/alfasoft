<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasAlert
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
        $response = $next($request);

        $ids = $request->session()->get('todo', []);

        if ($ids) {
            $tasks = count($ids);

            $request->session()->flash('alert', "Há {$tasks} condicionantes pendentes");
        }
        
        return $response;
    }
}
