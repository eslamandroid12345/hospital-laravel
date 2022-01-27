<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Http\traits\FatherApiCheck;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    use FatherApiCheck;



    public function index(){

        $ticket = TicketResource::collection(Ticket::get());

        if(!$ticket){

            return $this->returnMessageError('empty tickets user register soon','5000');
        }
        else{

            return $this->returnDataSuccess('Ticket found successfully','201','Tickets',$ticket);

        }

    }


    public function create(Request $request){

        $rules = [

            'phone' => 'required|integer',
            'patient_address' => 'required',
            'operation' => 'required',

        ];

        $message = [
            'phone.required'  => 'رقم الهاتف مطلوب برجاء كتابته',
            'phone.integer'  => 'رقم الهاتف يجب ان يكون رقم',
            'patient_address.required' => 'عنوان المريض مطلوب',
            'operation.required' => 'نوع الكشف او العمليه',

        ];

        $validator = Validator::make($request->all(),$rules,$message);


        if($validator->fails()){

            return $this->returnMessageError($validator->errors(),'5000');
        }




       //user who authenticated with api-user
        $user_id = auth('user-api')->id();

        $ticket = new TicketResource(Ticket::create([

            'phone' => $request['phone'],
            'patient_address' => $request['patient_address'],
            'operation' => $request['operation'],
             'user_id' => $user_id,

        ]));

        return $this->returnDataSuccess('Ticket created successfully','201','ticket',$ticket);

    }


    public function update(Request $request,$id){

        $rules = [

            'phone' => 'required|integer',
            'patient_address' => 'required',
            'operation' => 'required',

        ];

        $message = [
            'phone.required'  => 'رقم الهاتف مطلوب برجاء كتابته',
            'phone.integer'  => 'رقم الهاتف يجب ان يكون رقم',
            'patient_address.required' => 'عنوان المريض مطلوب',
            'operation.required' => 'نوع الكشف او العمليه',

        ];

        $validator = Validator::make($request->all(),$rules,$message);


        if($validator->fails()){

            return $this->returnMessageError($validator->errors(),'5000');
        }

        $ticket = Ticket::find($id);

        if(!$ticket){

            return $this->returnMessageError('ticket not found','404');

        }
        else{

            $ticket->update([

                'phone' => $request['phone'],
                'patient_address' => $request['patient_address'],
                'operation' => $request['operation'],

            ]);

            return $this->returnDataSuccess('تم تعديل بيانات الحجز بتجاح','201','ticket',$ticket);

        }

    }//end method of update

    public function delete($id){


        $ticket = Ticket::find($id);

        if(!$ticket){

            return $this->returnMessageError('ticket not found','404');

        }
        else{

            $ticket->delete();

            return $this->returnDataSuccess('تم حذف بيانات الحجز بتجاح','201','user',true);

        }

    }

}
