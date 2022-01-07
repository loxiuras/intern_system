<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $details['subject'] }}</title>
    <style type="text/css">
        @if ( $details['structure']['style'] )
            {{ $details['structure']['style'] }}
        @endif
    </style>
</head>
<body>

@if ( $details['structure']['header'] )
    {!! $details['structure']['header'] !!}
    <br><br>
@endif
@if ( $details['structure']['body'] )
    {!! $details['structure']['body'] !!}
@endif
@if ( $details['structure']['footer'] )
    <br><br>
    {!! $details['structure']['footer'] !!}
@endif

</body>
</html>
