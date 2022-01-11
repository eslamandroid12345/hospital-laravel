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
                    <form action="{{route('tickets.destroy',$ticket->id)}}" method="POST">

                        @csrf
                        @method('DELETE')
                        <a class="btn btn-secondary" href="{{route('tickets.edit',$ticket->id)}}">edit</a>
                        <a class="btn btn-primary" href="{{route('tickets.show',$ticket->id)}}">show</a>
                        <a class="btn btn-info text-white" href="{{route('soft',$ticket->id)}}">soft</a>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            </tbody>
        @endforeach

    </table>

        {{ $tickets->links("pagination::bootstrap-4") }}


@endsection
