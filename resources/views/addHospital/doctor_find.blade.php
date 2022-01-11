@extends('admin.layout')

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
            <th>اسم الدكتور</th>
            <th>هاتف الدكتور</th>
            <th>عنوان الدكتور</th>
            <th>الراتب</th>

        </tr>
        </thead>

        @foreach($doctors as $medican)

            <tbody>
            <tr>
                <td>{{$medican->doctor_name}}</td>
                <td>{{$medican->doctor_phone}}</td>
                <td>{{$medican->doctor_address}}</td>
                <td>{{$medican->salary}}</td>
            </tr>
            </tbody>
        @endforeach

    </table>
@endsection


