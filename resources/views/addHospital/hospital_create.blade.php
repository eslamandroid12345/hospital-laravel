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
        <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">hospital_image</label>
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="image">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">hospital_name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hospital_name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">hospital_address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="hospital_address">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">build_number</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="build_number">
            </div>

            <button type="submit" class="btn btn-primary">save</button>
        </form>
    </div>
@endsection

