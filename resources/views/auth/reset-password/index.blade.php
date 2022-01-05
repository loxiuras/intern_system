
@extends('layout.system')

@section('css')

@endsection

@section("bodyClass", "bg-default g-sidenav-show g-sidenav-pinned")

@section('pageContent')

    <div class="main-content">

        @include("auth.reset-password.header")
        @include("auth.reset-password.form")

    </div>

@endsection

@section('js')

    <script src="{{ url('js/plugins/NovaPasswordViewer.js') }}"></script>

@endsection
