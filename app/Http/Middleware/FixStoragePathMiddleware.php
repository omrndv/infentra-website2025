<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FixStoragePathMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!$response instanceof \Illuminate\Http\Response) {
            return $response;
        }

        $contentType = $response->headers->get('Content-Type');
        if ($contentType && str_contains($contentType, 'text/html')) {

            $content = $response->getContent();

            if (app()->environment('production')) {
                $content = str_replace(
                    [
                        'href="/storage/',
                        "href='storage/",
                        'src="/storage/',
                        "src='storage/"
                    ],
                    [
                        'href="/public/storage/',
                        "href='public/storage/",
                        'src="/public/storage/',
                        "src='public/storage/"
                    ],
                    $content
                );
            }

            $response->setContent($content);
        }

        return $response;
    }
}
