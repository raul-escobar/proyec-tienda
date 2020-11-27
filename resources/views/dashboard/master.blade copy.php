<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GAMDT</title>
</head>
<body>
    @include('dashboard.partials.nav-header-main')
    @include('dashboard.partials.session-flash-status')

   
    @yield('content')
</div> 
<script src="{{asset("js/app.js")}}"></script>

</body>
</html>
