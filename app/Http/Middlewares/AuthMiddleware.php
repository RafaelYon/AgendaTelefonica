<?php

namespace App\Http\Middlewares;

use App\Http\Middlewares\Middleware;
use App\Security\Auth\Auth;
use App\Http\Request;

class AuthMiddleware implements Middleware
{
    public static function handler(Request $requets)
    {
        if (Auth::check())
            return;

        redirect('/login');
    }
}