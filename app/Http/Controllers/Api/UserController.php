<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\traits\FatherApiCheck;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use FatherApiCheck;



    public function index(){

        $users = User::get();
        $resources = UserResource::collection($users);

        return $this->returnDataSuccess('تم الحصول علي بيانات المستحدمين بنجاح','201','users',$resources);
    }


    public function show($id){

        $user = User::find($id);

        if(!$user){

            return $this->returnMessageError('هذا المستخدم غير موجود بقائمه المستخدمين','404');
        }
        else{

            $resource = new UserResource($user);
            return $this->returnDataSuccess('user found successfully','201','user',$resource);
        }
    }


    public function update(Request $request,$id){


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

        $user = new UserResource(User::find($id));

        if(!$user){

            return $this->returnMessageError('user not found','404');
        }
        else{

            $user->update([

                'name' => $request['name'],
                'mobile' => $request['mobile'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),


            ]);

            return $this->returnDataSuccess('تم تحديث بيانات المستخدم بتجاح','201','user',$user);

        }

    }


    public function delete($id){


        $user = User::find($id);

        if(!$user){

            return $this->returnMessageError('user not found','404');

        }
        else{

            $user->delete();

            return $this->returnDataSuccess('تم حذف بيانات المستخدم بتجاح','201','user',true);

        }


    }


}
