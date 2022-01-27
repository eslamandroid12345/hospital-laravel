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
            <input class="form-control col-11" type="text" name="search" placeholder="{{__('doctor.search_for')}}">
            <button class="btn btn-primary col-1" type="submit">{{__('doctor.search')}}</button>
        </div>

    </form>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>{{__('doctor.name')}}</th>
            <th>{{__('doctor.phone')}}</th>
            <th>{{__('doctor.hospital')}}</th>
            <th>{{__('doctor.address')}}</th>
            <th>{{__('doctor.salary')}}</th>
            <th>{{__('doctor.edit')}}</th>

        </tr>
        </thead>

        @if($medicans->count() == true)
        @foreach($medicans as $medican)

            <tbody>
            <tr>
                <td>{{$medican->doctor_name}}</td>
                <td>{{$medican->doctor_phone}}</td>
                <td>{{$medican->hospital->hospital_name}}</td>
                <td>{{$medican->doctor_address}}</td>
                <td>{{$medican->salary}}</td>
                <td>
                    <form action="{{route('medicans.destroy',$medican->id)}}" method="POST">

                        @csrf
                        @method('DELETE')
                        <a class="btn btn-secondary" href="{{route('medicans.edit',$medican->id)}}">{{__('doctor.update')}}</a>
                        <a class="btn btn-info text-white" href="{{route('medican.services.show',$medican->id)}}">{{__('doctor.services')}}</a>
                        <a class="btn btn-primary" href="{{route('medicans.show',$medican->id)}}">{{__('doctor.show')}}</a>
                        <button class="btn btn-danger" type="submit">{{__('doctor.delete')}}</button>
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

