@extends('admin.layout')

@section('content')

    <div class="container">
        @if($message = Session::get('success'))

            <div class="alert alert-primary">
                {{$message}}
            </div>

        @endif
    </div>
    <form action="{{route('users.data')}}" method="GET">

        <div class="form-group container row">
            <input class="form-control col-11" type="text" name="search" placeholder="ابحث باسم المستخدم">
            <button class="btn btn-primary col-1" type="submit">ابحث</button>
        </div>

    </form>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>اسم المستخدم</th>
            <th>رقم الهاتف</th>
            <th>البريد الالكتروني</th>
            <th>اجراء</th>

        </tr>
        </thead>

        @if(count($users) == true)
            @foreach($users as $person)

                <tbody>
                <tr>
                    <td>{{$person->name}}</td>
                    <td>
                        @if(empty($person->mobile))
                            {{__('لا يوجد هاتف')}}

                        @elseif(!empty($person->mobile))

                            {{$person->mobile}}
                        @endif
                    </td>
                    <td>{{$person->email}}</td>

                    <td>
                        <form action="{{route('users.destroy',$person->id)}}" method="POST">

                            @csrf
                            @method('DELETE')
                            <a class="btn btn-secondary" href="{{route('users.edit',$person->id)}}">تعديل</a>
                            <a class="btn btn-primary" href="{{route('users.show',$person->id)}}">عرض</a>
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            @endforeach
        @elseif(count($users) == false)
            <div class="alert alert-danger text-right">
                {{__('لا يوجد مستخدمين')}}
            </div>
        @endif
    </table>
    {{ $users->links('pagination::bootstrap-4') }}
@endsection


