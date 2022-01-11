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
            <th>اسم الخدمه</th>
            <th>بدايه الشفت</th>
            <th>نهايه الشفت</th>
        </tr>
        </thead>

        @foreach($services as $service)

            <tbody>
            <tr>
                <td>{{$service->service_name}}</td>
                <td>{{$service->service_from}}</td>
                <td>{{$service->service_to}}</td>
            </tr>
            </tbody>
        @endforeach

    </table>
@endsection

