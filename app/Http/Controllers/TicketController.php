<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{


    public function home(){

        return view('hospital.home');
    }

    public function dash(){

        return view('addHospital.index');
    }
    public function welcome(){

        return view('hospital.welcome');
    }

    public function index()
    {
        $tickets = Ticket::where('user_id',Auth::id())->latest()->paginate(6);
        return view('hospital.index',compact('tickets'));
    }

    public function create()
    {

        return view('hospital.create');

    }

    public function edit(Ticket $ticket)
    {
        return view('hospital.edit',compact('ticket'));

    }

    public function show(Ticket $ticket)
    {
        return view('hospital.show',compact('ticket'));

    }

    public function store(Request $request)
    {

        $rules = [

            'phone' => 'required',
            'patient_address' => 'required',
            'operation' => 'required',

        ];

        $message = [
            'phone.required'  => 'رقم الهاتف مطلوب برجاء كتابته',
            'patient_address.required' => 'عنوان المريض مطلوب',
            'operation.required' => 'نوع الكشف او العمليه',

        ];

        $request->validate($rules,$message);

        $ticket = Ticket::create($request->all());

        return redirect()->route('tickets.index')->with('success','patient register ticket successfully');

    }

    public function update(Request $request, Ticket $ticket)
    {
        $rules = [

            'phone' => 'required',
            'patient_address' => 'required',
            'operation' => 'required',

        ];

        $message = [
            'phone.required'  => 'رقم الهاتف مطلوب برجاء كتابته',
            'patient_address.required' => 'عنوان المريض مطلوب',
            'operation.required' => 'نوع الكشف او العمليه',

        ];

        $request->validate($rules,$message);

        $ticket->update($request->all());
        return redirect()->route('tickets.index')->with('success','patient updated ticket successfully');

    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success','patient deleted ticket successfully');

    }

    public function softDelete($id)
    {
        $ticket = Ticket::find($id)->delete();
        return redirect()->route('tickets.index')->with('success','patient deleted ticket successfully');

    }

    public function trashed()
    {
        $tickets = Ticket::onlyTrashed()->where('user_id',Auth::id())->get();
        return view('hospital.trashed',compact('tickets'));
    }

    public function restore($id)
    {

        $tickets = Ticket::onlyTrashed()->where('id',$id)->restore();
        return redirect()->route('tickets.index')->with('success','patient restore ticket successfully');


    }

    public function delete($id)
    {
        $tickets = Ticket::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('trashed')->with('success','patient deleted ticket successfully');


    }
}
