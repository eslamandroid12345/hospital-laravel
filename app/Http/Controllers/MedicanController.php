<?php

namespace App\Http\Controllers;
use App\Models\Hospital;
use App\Models\Medican;
use Illuminate\Http\Request;

class MedicanController extends Controller
{


    public function index(Request $request)
    {
        if($request->has('search')){

            $medicans = Medican::where('doctor_name','LIKE','%' . $request->search)->orwhere('doctor_phone','LIKE','%' . $request->search)->paginate(MAX_PAGINATE);

        }else{

            $medicans = Medican::latest()->paginate(MAX_PAGINATE);

        }
        return view('addHospital.doctor_index',compact('medicans'));
    }


    public function create()
    {
        $hospitals = Hospital::select('id','hospital_name')->get();
        return view('addHospital.doctor_create',compact('hospitals'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'hospital_id' =>'required',
            'doctor_name'=>'required',
            'doctor_phone'=>'required',
            'doctor_address'=>'required',
            'salary'=>'required'

        ]);

        $medican = Medican::create($request->all());
        return redirect()->route('medicans.index')->with('success','medican created successfully');

    }


    public function show(Medican $medican)
    {

        return view('addHospital.doctor_show',compact('medican'));

    }


    //edit of profile of doctors and data of doctor
    public function edit(Medican $medican)
    {
        $hospitals = Hospital::select('id','hospital_name')->get();
        return view('addHospital.doctor_edit',compact('medican','hospitals'));

    }


    public function update(Request $request, Medican $medican)
    {
        $request->validate([

            'hospital_id' =>'required',
            'doctor_name'=>'required',
            'doctor_phone'=>'required',
            'doctor_address'=>'required',
            'salary'=>'required'

        ]);

        $medican->update($request->all());
        return redirect()->route('medicans.index')->with('success','medican updated successfully');

    }

    public function destroy(Medican $medican)
    {

        $medican->delete();
        return redirect()->route('medicans.index')->with('success','medican deleted successfully');


    }

    public function softDelete($id)
    {

        $medican = Medican::find($id)->delete();
        return redirect()->route('medicans.index')->with('success','medican deleted successfully');


    }

    public function trashed()
    {

        $medican = Medican::onlyTrashed()->latest()->paginate(MAX_PAGINATE);
        return view('addHospital.doctor_trashed',compact('medican'));
    }

    public function restore($id)
    {

        $medican = Medican::onlyTrashed()->where('id',$id)->restore();
        return redirect()->route('medicans.index')->with('success','medican restore successfully');



    }

    public function delete($id)
    {

        $medican = Medican::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('medican.trashed')->with('success','medican deleted successfully');



    }

    public function medicanServicesShow($id){


        $services = Medican::find($id)->service;
        return view('addHospital.service_find',compact('services'));

    }
}
