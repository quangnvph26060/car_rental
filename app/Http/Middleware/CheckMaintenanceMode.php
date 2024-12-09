<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next)
    {
        $config = Config::first();

        if ($config->maintenance == 0) {
            return redirect()->route('maintenance');
        }
        if ($request->is('maintenance')) {
            return redirect()->route('/');  // Thay 'home' bằng route của trang chủ của bạn
        }
        return $next($request);
    }
}
