<?php

namespace App\Http\Middleware;

use App\Http\traits\FatherApiCheck;
use Closure;
use Exception;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
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

                if ($e instanceof TokenInvalidException){

                    return $this->returnMessageError('تم تسجيل الخروج برجاء اعاده الدخول مجددا','500');

                }else if ($e instanceof TokenExpiredException){

                    return $this->returnMessageError('جلسه هذا المستخدم انتهت برجاء تسجيل الدخول مره اخري','500');


                }else{


                    return $this->returnMessageError('غير مسموح لك بالدخول','404');
                }
            }
            return $next($request);

        }



    }
}
