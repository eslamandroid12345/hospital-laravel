<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;


class HospitalController extends Controller
{


    public function index(Request $request)
    {
        if($request->has('search')){

            $hospitals = Hospital::where('hospital_name','LIKE', '%' . $request->search)->paginate(6);

        }else{

            $hospitals = Hospital::latest()->paginate(6);

        }
        return view('addHospital.hospital_index',compact('hospitals'));

    }

    //hospital find doctors
    public function getDoctors($id){

        $doctors = Hospital::find($id)->medican;
        return view('addHospital.doctor_find',compact('doctors'));
    }


    public function create()
    {
      return view('addHospital.hospital_create');
    }


    public function store(Request $request)
    {

        $rules = [

            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hospital_name'=>'required',
            'hospital_address'=>'required',
            'build_number'=>'required'

        ];

        $message = [

            'image.required'=>'صوره المشفي مطلوبه',
            'hospital_name.required'=>'اسم المستشفي مطلوب',
            'hospital_address.required'=>'عنوان المستشفي مطلوب',
            'build_number.required'=>'عدد الطوابق للمشفي مطلوب'

        ];


        $request->validate($rules,$message);
         $data = $request->all();


        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }

        $hospital = Hospital::create($data);
        return redirect()->route('profile.index')->with('success','hospital created successfully');

    }


    public function show(Hospital $hospital)
    {

        return view('addHospital.hospital_show',compact('hospital'));

    }


    public function edit(Hospital $profile)
    {

        return view('addHospital.hospital_edit',compact('profile'));

    }


    public function update(Request $request, Hospital $profile)
    {

        $rules = [

            'hospital_name'=>'required',
            'hospital_address'=>'required',
            'build_number'=>'required'

        ];

        $message = [

            'image.required'=>'صوره المشفي مطلوبه',
            'hospital_name.required'=>'اسم المستشفي مطلوب',
            'hospital_address.required'=>'عنوان المستشفي مطلوب',
            'build_number.required'=>'عدد الطوابق للمشفي مطلوب'

        ];


        $request->validate($rules,$message);
        $data = $request->all();



        if ($image = $request->file('image')) {

            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }else{

            unset($data['image']);
        }

        $profile->update($data);
        return redirect()->route('profile.index')->with('success','hospital updated successfully');


    }

    public function destroy(Hospital $hospital)
    {

        $hospital->delete();
        return redirect()->route('profile.index')->with('success','hospital deleted successfully');


    }

    public function softDelete($id)
    {
        $hospital = Hospital::find($id)->delete();
        return redirect()->route('profile.index')->with('success','hospital deleted successfully');


    }

    public function trashed()
    {

        $hospital = Hospital::onlyTrashed()->latest()->paginate(6);
        return view('addHospital.hospital_trashed',compact('hospital'));
    }

    public function restore($id)
    {

        $hospital = Hospital::onlyTrashed()->where('id',$id)->restore();
        return redirect()->route('profile.index')->with('success','hospital restore successfully');


    }

    public function delete($id)
    {

        $hospital = Hospital::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('hospital.trashed')->with('success','hospital deleted successfully');


    }
}
