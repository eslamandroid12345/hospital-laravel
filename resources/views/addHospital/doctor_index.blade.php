@extends('admin.layout')
@section('content')

    <div class="container">
        @if($message = Session::get('success'))

            <div class="alert alert-primary">
                {{$message}}
            </div>

        @endif
    </div>
    <form action="{{route('medicans.index')}}" method="GET">
        <div class="form-group container row">
            <input class="form-control col-11" type="text" name="search" placeholder="ابحث باسم الدكتور او برقم التيلفون">
            <button class="btn btn-primary col-1" type="submit">ابحث</button>
        </div>

    </form>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>اسم الدكتور</th>
            <th>هاتف الدكتور</th>
            <th>عنوان الدكتور</th>
            <th>الراتب</th>
            <th>اخذ اجراء</th>

        </tr>
        </thead>

        @if($medicans->count() == true)
        @foreach($medicans as $medican)

            <tbody>
            <tr>
                <td>{{$medican->doctor_name}}</td>
                <td>{{$medican->doctor_phone}}</td>
                <td>{{$medican->doctor_address}}</td>
                <td>{{$medican->salary}}</td>
                <td>
                    <form action="{{route('medicans.destroy',$medican->id)}}" method="POST">

                        @csrf
                        @method('DELETE')
                        <a class="btn btn-secondary" href="{{route('medicans.edit',$medican->id)}}">تعديل</a>
                        <a class="btn btn-info text-white" href="{{route('medican.services.show',$medican->id)}}">الخدمات</a>
                        <a class="btn btn-primary" href="{{route('medicans.show',$medican->id)}}">عرض</a>
                        <button class="btn btn-danger" type="submit">حذف</button>
                    </form>
                </td>
            </tr>
            </tbody>
        @endforeach

        @elseif($medicans->count() == false)
            <div class="alert alert-danger text-right">
                {{__('لا يوجد دكاتره')}}
            </div>
        @endif
    </table>
    {{ $medicans->links('pagination::bootstrap-4') }}
@endsection

