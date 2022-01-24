<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\traits\FatherApiCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use FatherApiCheck;

    public function login(Request $request){

        $rules =[

           'email' => 'required|exists:users,email|email',
            'password' => 'required'

        ];


        $message = [

            'email.required' => 'الايميل مطلوب',
            'email.email' => 'البريد لابد ان يكون ايميل',
            'email.exists' => 'الايميل لابد له ان يكون مسجل من قبل',
            'password.required' => 'كلمه المرور مطلوبه'

        ];


        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){

            return $this->returnMessageError($validator->errors(),'5000');
        }


        $token = Auth::guard('user-api')->attempt($request->only(['email','password']));

        if(!$token){

            return $this->returnMessageError('خطاء بتسجيل بيانات الدخول برجاء اعاده التسجيل مره اخري','404');
        }


        $user = Auth::guard('user-api')->user();
        $user->token = $token;

        return $this->returnDataSuccess('اهلا بك user-api','201','user',$user);

    }
}
