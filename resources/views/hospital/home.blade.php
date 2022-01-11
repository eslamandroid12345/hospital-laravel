@extends('layouts.app')

@section('content')
    <h5 class="text-center my-5"> {{Auth::user()->name}} اهلا بك ايها المريض </h5>
@endsection
