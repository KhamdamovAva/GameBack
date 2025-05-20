<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class SetLocaleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->header('Accept-Language');

        if (in_array($locale, ['uz', 'ru'])) {
            app()->setLocale($locale);
        } else {
            app()->setLocale('ru');
        }

        return $next($request);
    }
}
