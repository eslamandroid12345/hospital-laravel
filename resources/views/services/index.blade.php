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
            <th>اجراء</th>

        </tr>
        </thead>

        @foreach($services as $service)

            <tbody>
            <tr>
                <td>{{$service->service_name}}</td>
                <td>{{$service->service_from}}</td>
                <td>{{$service->service_to}}</td>
                <td>
                    <form action="{{route('services.destroy',$service->id)}}" method="POST">

                        @csrf
                        @method('DELETE')
                        <a class="btn btn-secondary" href="{{route('services.edit',$service->id)}}">تعديل</a>
                        <a class="btn btn-primary" href="{{route('services.show',$service->id)}}">عرض</a>
                        <button class="btn btn-danger" type="submit">حذف</button>
                    </form>
                </td>
            </tr>
            </tbody>
        @endforeach

    </table>

    {{ $services->links("pagination::bootstrap-4") }}

@endsection


