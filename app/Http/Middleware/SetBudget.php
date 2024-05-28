<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetBudget
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    if ($request->routeIs('budget.create')) {
        return $next($request);
    }

    // Check if the user has a budget
    if (!empty(auth()->user()->budget)) {
        // User has a budget, allow them to proceed
        return $next($request);
    }

    // If the user is authenticated but doesn't have a budget, redirect to 'budget.create' route
    return redirect()->route('budget.create');
}



}
