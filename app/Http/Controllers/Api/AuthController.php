<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\traits\FatherApiCheck;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

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



    public function register(Request $request){

        $rules =[

            'name' => 'required|max:100',
            'mobile' => 'required|integer',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8'

        ];


        $message = [


            'name.required' => 'ادخل اسم المستخدم',
            'mobile.required' => 'ادخل رقم الهانف',
            'email.required' => 'برجاء ادخال البريد الالكتروني',
            'email.email' =>'البريد يجب ان يكون ايميل',
            'email.unique' => 'هذا الايميل موجود بالفعل برجاء ادخال ايميل اخر',
            'password.required' => 'كلمه المرور مطلوبه',
            'password.min' => 'كلمه المرور يجب ان لا تقل عن 8 حروف او ارقام'

        ];


        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){

            return $this->returnMessageError($validator->errors(),'5000');
        }

        $user = User::create([

            'name' => $request['name'],
            'mobile' => $request['mobile'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),


        ]);

        if($user){

            return $this->returnDataSuccess('تم تسجيل بيانات المستخدم بتجاح','6000','user',$user);
        }


    }


    public function logout(Request $request){

        $token = $request->header('auth-token');

        if($token){

            JWTAuth::setToken($token)->invalidate();

            return $this->returnMessageSuccess('user logout successfully',201);

        }
        else{

            return $this->returnMessageError('failed to logout please try again',500);
        }
    }
}
