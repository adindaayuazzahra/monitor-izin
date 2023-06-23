<?php

namespace App\Http\Middleware;

use App\Models\Dokumen;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyDownloadToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        $dok = Dokumen::findOrFail($id);
        $token = $request->token;
        if ($token !== $dok->token) {
            $request->session()->flash('message', 'Token yang Anda Masukkan Salah!');
            $request->session()->flash('title', 'Gagal');
            $request->session()->flash('icon', 'error');
            return redirect()->back();
        }

        return $next($request, $id);
    }
}
