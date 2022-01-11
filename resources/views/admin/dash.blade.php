@extends('admin.layout')


@section('content')

    <div class="container">
        @if($message = Session::get('success'))

            <div class="alert alert-primary">
                {{$message}}
            </div>

        @endif
    </div>

    <form action="{{route('data')}}" method="GET">

        <div class="form-group container row">
            <input class="form-control col-11" type="text" name="search" placeholder="ابحث بهاتف المريض">
            <button class="btn btn-primary col-1" type="submit">ابحث</button>
        </div>

    </form>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>الهاتف</th>
            <th>عنوان المريض</th>
            <th>نوع الكشف</th>
            <th>اجراء</th>

        </tr>
        </thead>


        @if($tickets->count() == true)
        @foreach($tickets as $ticket)

            <tbody>
            <tr>
                <td>{{$ticket->phone}}</td>
                <td>{{$ticket->patient_address}}</td>
                <td>{{$ticket->operation}}</td>
                <td><a class="btn btn-info text-white" href="{{route('soft.admin',$ticket->id)}}">حذف</a></td>
            </tr>
            </tbody>
        @endforeach
        @elseif($tickets->count() == false)
            <div class="alert alert-danger text-right">
                {{__('لا يوجد حجوزات للمرضي')}}
            </div>
        @endif
    </table>

    {{ $tickets->links("pagination::bootstrap-4") }}

@endsection

