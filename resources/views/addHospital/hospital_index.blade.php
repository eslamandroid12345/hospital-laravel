@extends('admin.layout')

@section('content')

    <div class="container">
        @if($message = Session::get('success'))

            <div class="alert alert-primary text-right">
                {{$message}}
            </div>

        @endif
    </div>

    <form action="{{route('profile.index')}}" method="GET">
        @csrf
        <div class="form-group container row">
            <input class="form-control col-11" type="text" name="search" placeholder="ابحث باسم المستشفي">
            <button class="btn btn-primary col-1" type="submit">ابحث</button>
        </div>

    </form>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>اسم المستشفي</th>
            <th>عنوان المستشفي</th>
            <th>عدد الطوابق</th>
            <th>الصوره</th>
            <th>اخذ اجراء</th>

        </tr>
        </thead>


        @if($hospitals->count() == true)
        @foreach($hospitals as $hospital)

            <tbody>
            <tr>
                <td>{{$hospital->hospital_name}}</td>
                <td>{{$hospital->hospital_address}}</td>
                <td>{{$hospital->build_number}}</td>
                <td><img style="width: 80px;height: 80px" src="/image/{{$hospital->image}}"></td>

                <td>

                        <a class="btn btn-secondary" href="{{route('profile.edit',$hospital->id)}}">تعديل</a>
                        <a class="btn btn-primary" href="{{route('profile.show',$hospital->id)}}">عرض</a>
                        <a class="btn btn-primary" href="{{route('profile.doctors',$hospital->id)}}">دكاتره المشفي</a>
                        <a class="btn btn-primary" href="{{route('hospital.soft',$hospital->id)}}">Soft</a>

                </td>
            </tr>
            </tbody>
        @endforeach
        @elseif($hospitals->count() == false)
            <div class="alert alert-danger text-right">
                {{__('لا يوجد مستشفيات')}}
            </div>
        @endif
    </table>
    {{ $hospitals->links("pagination::bootstrap-4") }}

@endsection

