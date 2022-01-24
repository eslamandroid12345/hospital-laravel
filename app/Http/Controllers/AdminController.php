<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class AdminController extends Controller
{

    public function getTickes(Request $request){

        if($request->has('search')){

            $tickets = Ticket::where('phone','LIKE','%' . $request->search)->paginate(MAX_PAGINATE);

         }else{

            $tickets = Ticket::latest()->paginate(MAX_PAGINATE);

        }

        return view('admin.dash',compact('tickets'));
    }


    public function softDelete($id){

        $ticket = Ticket::find($id)->delete();
        return redirect()->route('data')->with('success','booking deleted successfully');


    }
    public function adminRegisterData(){

        return view('admin.admin_register');
    }


    public function adminLoginData(){

        return view('admin.admin_login');
    }

    public function adminLogin(Request $request){

        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=> $request->password])){

            return redirect()->intended('/profile')->with('success','اهلا بك ايها المدير العام');
        }else{

            return back()->withInput($request->only('email'));
        }
    }


    public function adminRegister(Request $request){

        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',

        ]);

         $admins = Admin::create([

            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])//Encapsulation of password
        ]);

        return redirect()->route('profile.index')->with('success','admin created successfully');
    }



}
