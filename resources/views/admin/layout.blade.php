

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>اداره الموظفين</title>

    <!-- start link of icon -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
    <!-- end link of icon -->

    <!-- start link of bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- end link of bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

</head>
<style>


</style>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-12 col-xs-12 col-12 one">
            <div class="text-right five">
                    <ul>
                        <!-- Authentication Links -->

                        <li><a  href="#">اهلا بك :{{ Auth::user()->name }} </a></li>
                        <li><a  href="{{route('medicans.index')}}">الدكاتره</a></li>
                        <li><a  href="{{route('medicans.create')}}">اضافه دكنور</a></li>
                        <li><a  href="{{route('profile.create')}}">اضافه مستشفي</a></li>
                        <li><a  href="{{route('profile.index')}}">المستشفيات</a></li>
                        <li><a  href="{{route('add')}}">اضاف خدمه للدكتور</a></li>
                        <li><a  href="{{route('data')}}">حجوزات المرضي</a></li>
                        <li><a  href="{{route('users.data')}}">المستخدمين</a></li>
                        <li><a  href="{{route('admin.register.data')}}">اضافه ادمن للمستشفي</a></li>
                        <li><a  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('تسجيل الخروج') }}
                            </a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </ul>
            </div>



        </div>

        <div class="col-md-10 col-sm-12 col-xs-12 col-12 two">
            <div class="col-md-12 col-sm-12 col-xs-12 three">
                <div class="ca">
                    <i class="fa fa-bars"></i>

                </div>
                <div class="cat">

                    <div class="rol">
                        <i class="fa fa-comment-medical"></i>
                        <i class="fa fa-bell"></i>
                        <i class="fa fa-comment-alt"></i>
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 four">
                <!-- body style start -->
                  @yield('content')
                <!-- body style end -->

            </div>



        </div>



    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


