<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class Sanctum
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $bearer = $request->bearerToken();
        $arrToken = explode('|',$bearer);
        $hashToken = hash('sha256',$arrToken[1]);
        if ($token = DB::table('personal_access_tokens')->where('id',$arrToken[0])->where('token',$hashToken)->first())
        {
            if ($user = User::find($token->tokenable_id))
            {
                Auth::login($user);
                return $next($request);
            }
        }

        return response()->json([
            'success' => false,
            'error' => 'Access denied.'
        ]);
    }
}