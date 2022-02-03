

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
    body{

        direction: rtl;
    }
</style>

 @if(LaravelLocalization::setLocale() == 'en')

     <style>
         body{

             direction: ltr;
         }
     </style>
     @endif


<body>




             @include('admin.navbar')
             <br><br><br>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- body style start -->
                  @yield('content')
                <!-- body style end -->

            </div>


             <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
             <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

         <script>
             Pusher.logToConsole = true;

             var pusher = new Pusher('c015c0d70ff48c211999', {
                 cluster: 'mt1'
             });

         </script>
            <script src="{{asset('js/notification.js')}}"></script>

</body>
</html>


