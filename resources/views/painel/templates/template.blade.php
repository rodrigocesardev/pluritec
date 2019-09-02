<!DOCTYPE html>
<html>
    <head>
        <title>{{$title}}</title>
        
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="{{url('assets/painel/css/style.css')}}"/>
    </head>
    <body>
        
        <div class="container">
            @yield('content')
        </div>
        
    </body>
</html>