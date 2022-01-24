<?php

namespace App\Http\Controllers;
use App\Models\Medican;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceMedicanController extends Controller
{

    //all doctor and services

    public function getMedicanAndServices(){

        $doctors = Medican::select('id','doctor_name')->get();
        $services = Service::select('id','service_name')->get();


        return view('services_doctors.service_create',compact('doctors','services'));

    }

    public function addServicesDoctor(Request $request){

        $doctor = Medican::find($request->doctor_id);//find id of doctor from request
        if(!$doctor){

            abort('404','هذا الدكتور غير موجود بالقائمه');
        }

        //attach , sync , syncWithoutDetaching

        $doctor->service()->syncWithoutDetaching($request->service_id);//add many service to medican
        return redirect()->back()->with('success','تم اضافه خدمات الدكتور بنجاح');


    }

}
