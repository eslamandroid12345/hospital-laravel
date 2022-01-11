@extends('admin.layout')

@section('content')
    <div class="container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-primary">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <form action="{{route('medicans.store')}}" method="post">

            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">hospital</label>
                <select name="hospital_id" class="form-control">
                    @foreach($hospitals as $hospital)
                        <option value="{{$hospital->id}}">{{$hospital->hospital_name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">doctor_name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="doctor_name">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">doctor_phone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="doctor_phone">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">doctor_address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="doctor_address">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">salary</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="salary">
            </div>

            <button type="submit" class="btn btn-primary">save</button>
        </form>
    </div>
@endsection


