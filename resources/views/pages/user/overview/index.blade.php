
@extends('layout.system')

@section('pageContent')


    @include("layout.nav.index")


@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>

@endsection
