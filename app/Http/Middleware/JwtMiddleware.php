<?php

namespace App\Http\Middleware;

use App\Http\traits\FatherApiCheck;
use Closure;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{

    use FatherApiCheck;

    public function handle($request, Closure $next, $guard = null)
    {


        if($guard != null){

            auth()->shouldUse($guard);
            try {


                $user= auth()->authenticate();


            } catch (Exception $e) {

                    return $this->returnMessageError('غير مسموح لك بالدخول','404');

            }
            return $next($request);

        }



    }
}
