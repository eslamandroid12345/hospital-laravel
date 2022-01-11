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
        <form action="{{route('profile.update',$profile->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">hospital_name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hospital_name" value="{{$profile->hospital_name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">hospital_address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="hospital_address" value="{{$profile->hospital_address}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">build_number</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="build_number" value="{{$profile->build_number}}">
            </div>

            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image"  class="form-control" placeholder="image">
                <img style="width: 80px;height: 80px" src="/image/{{$profile->image}}">
            </div>

            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
@endsection


