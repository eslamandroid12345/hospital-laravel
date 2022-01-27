<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {

        $services = Service::latest()->paginate(6);
        return view('services.index',compact('services'));
    }


    public function create()
    {

        return view('services.create');

    }


    public function store(Request $request)
    {
        $request->validate([

            'service_name'   => 'required',
            'service_from' => 'required',
            'service_to' => 'required'

        ]);

        $service = Service::create($request->all());

        return redirect()->route('services.index')->with('success','service created successfully');

    }


    public function show(Service $service)
    {

        return view('services.show',compact('service'));

    }


    public function edit(Service $service)
    {
        return view('services.edit',compact('service'));

    }

    public function update(Request $request, Service $service)
    {
        $request->validate([

            'service_name'   => 'required',
            'service_from' => 'required',
            'service_to' => 'required'

        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success','service updated successfully');

    }


    public function destroy(Service $service)
    {

        $service->delete();

        return redirect()->route('services.index')->with('success','service deleted successfully');


    }
}
