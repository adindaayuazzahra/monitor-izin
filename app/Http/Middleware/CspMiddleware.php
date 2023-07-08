<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CspMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set(
            'Content-Security-Policy',
            "default-src 'self' ; script-src 'self' https://unpkg.com/ https://kit.fontawesome.com/ https://cdn.datatables.net/ https://cdnjs.cloudflare.com/ https://cdn.jsdelivr.net/ https://code.jquery.com/ 'sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==' 'nonce-YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht' 'sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N' sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3' 'sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=' 'sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe'; style-src 'self'   'unsafe-inline' https://cdn.jsdelivr.net/ https://unpkg.com/ https://fonts.googleapis.com/ https://cdn.jsdelivr.net/ https://cdn.datatables.net https://cdn-uicons.flaticon.com/; img-src 'self'  data: ; font-src 'self'  https://ka-f.fontawesome.com/ https://cdn.jsdelivr.net/ https://cdn-uicons.flaticon.com/ https://fonts.googleapis.com https://fonts.gstatic.com/; connect-src  'self'   https://assets8.lottiefiles.com/ https://assets1.lottiefiles.com/ https://ka-f.fontawesome.com/; frame-src 'self'  https://kit.fontawesome.com/ https://unpkg.com/; worker-src 'self' "
        );

        return $response;
    }
}
