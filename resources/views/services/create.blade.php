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
        <form action="{{route('services.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">service_name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="service_name">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">service_from</label>
                <input type="time" class="form-control" id="exampleInputPassword1" name="service_from">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">service_from</label>
                <input type="time" class="form-control" id="exampleInputPassword1" name="service_to">
            </div>

            <button type="submit" class="btn btn-primary">save_service</button>
        </form>
    </div>
@endsection

