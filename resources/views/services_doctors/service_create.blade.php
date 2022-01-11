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

        
            @if($message = Session::get('success'))

                <div class="alert alert-primary">
                    {{$message}}
                </div>

            @endif

        <form action="{{route('service.doctors.add')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">الدكاتره</label>
                <select class="form-control" name="doctor_id">
                    @foreach($doctors as $doctor)
                    <option value="{{$doctor->id}}">{{$doctor->doctor_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">الخدمات</label>

                <select class="form-control" name="service_id[]" multiple>
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->service_name}}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">اضافه خدمات للدكتور</button>
        </form>
    </div>
@endsection


