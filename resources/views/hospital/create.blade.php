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
    <form action="{{route('tickets.store')}}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::id()}}">
        <div class="form-group">
            <label for="exampleInputEmail1">phone</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Patient_address</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="patient_address">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">operation</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="operation">
        </div>

        <button type="submit" class="btn btn-primary">save</button>
    </form>
    </div>
@endsection
