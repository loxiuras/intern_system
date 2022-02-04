<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <link href="{{ URL::asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/nucleo-svg.css') }}" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link id="pagestyle" href="{{ URL::asset('css/argon-design-system.css') }}" rel="stylesheet" />

    <style type="text/css">
        @yield('css')
    </style>
    @yield('styles')
</head>
<body @yield('bodyAttributes')>

@yield('pageContent')

@yield('js')
</body>
</html>
