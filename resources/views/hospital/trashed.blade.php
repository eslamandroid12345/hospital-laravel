@extends('layouts.app')

@section('content')

    <div class="container">
        @if($message = Session::get('success'))

            <div class="alert alert-primary">
                {{$message}}
            </div>

        @endif
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>phone</th>
            <th>Patient_address</th>
            <th>operation</th>
            <th>update</th>

        </tr>
        </thead>

        @foreach($tickets as $ticket)

            <tbody>
            <tr>
                <td>{{$ticket->phone}}</td>
                <td>{{$ticket->patient_address}}</td>
                <td>{{$ticket->operation}}</td>
                <td>


                        <a class="btn btn-secondary" href="{{route('restore',$ticket->id)}}">back</a>
                        <a class="btn btn-primary" href="{{route('delete',$ticket->id)}}">delete</a>

                </td>
            </tr>
            </tbody>
        @endforeach

    </table>

@endsection

