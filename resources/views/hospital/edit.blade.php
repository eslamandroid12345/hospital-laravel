@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-primary">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <form action="{{route('tickets.update',$ticket->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exampleInputEmail1">phone</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" value="{{$ticket->phone}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Patient_address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="patient_address" value="{{$ticket->patient_address}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">operation</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="operation" value="{{$ticket->operation}}">
            </div>

            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
@endsection

