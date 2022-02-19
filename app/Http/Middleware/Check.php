<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Check
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
        $ids = $request->session()->get('todo');

        if(!in_array($request->id, $ids)) {
            $request->session()->flash('error', 'Não foi possível excluir item da lista');

            return redirect()->route('clients.index');
        }
        return $next($request);
    }
}
