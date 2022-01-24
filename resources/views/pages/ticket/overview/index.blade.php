
@extends('layout.system')

@section('bodyAttributes', 'class=NovaPreloadSpinner data-time=1000')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/plugins/NovaPreloadSpinner.css') }}">
@endsection

@section('pageContent')

    @include('layout.banner')

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

    @include("layout.nav.index")

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>
    <script src="{{ url('js/plugins/NovaPreloadSpinner.js') }}"></script>

@endsection
