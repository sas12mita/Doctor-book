<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Store the intended URL in the session
            session(['url.intended' => $request->url()]);

            // Redirect to login with an error message
            return redirect()->route('login')->with('error', 'You must log in to access this page.');
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user's role matches the required roles
        if (!empty($roles) && !in_array($user->role, $roles)) {
            return redirect('/');
        }

        // Allow the request to proceed
        return $next($request);
    }
}
