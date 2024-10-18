<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Check if the request expects JSON, return null (used for APIs)
        if ($request->expectsJson()) {
            return null;
        }

        // Check the request URI and decide which login route to redirect to
        if ($request->is('admin/*')) {
            // Redirect to admin login if accessing admin routes
            return route('admin.login');
        }

        if ($request->is('customer/*')) {
            // Redirect to customer login if accessing customer routes
            return route('home-page');
        }

        // Default redirect for web users
        return route('login');
    }
}
