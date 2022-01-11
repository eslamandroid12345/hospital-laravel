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
        <form action="{{route('users.update',$user->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exampleInputEmail1">name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">mobile</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="mobile" value="{{$user->mobile}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="email" value="{{$user->email}}">
            </div>

            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
@endsection


