<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index(Request $request)
    {
        if($request->has('search')){

            $users = User::where('name','LIKE', '%' . $request->search)->paginate(MAX_PAGINATE);

        }else{

            $users = User::latest()->paginate(MAX_PAGINATE);

        }
        return view('users.index',compact('users'));

    }


    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }


    public function edit(User $user)
    {

        return view('users.edit',compact('user'));

    }


    public function update(Request $request, User $user)
    {
        $rules = [

            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',


        ];

        $message = [

            'name.required' => 'اسم المستخدم مطلوب',
            'mobile.required' => 'رقم هاتف الامستخدم مطلوب',
            'email.required' => 'ايميل المستخدم مطلوب',

        ];

        $this->validate($request,$rules,$message);

        $user->update($request->all());

        return redirect()->route('users.data')->with('success','تم تحديث بيانات المستخدم بنجاح');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.data')->with('success','تم حذف بيانات المستخدم بنجاح');

    }
}
