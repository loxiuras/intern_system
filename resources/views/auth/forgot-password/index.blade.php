
@extends('layout.system')

@section('css')

@endsection

@section("bodyClass", "bg-default g-sidenav-show g-sidenav-pinned")

@section('pageContent')

    <div class="main-content">

        @include("auth.forgot-password.header")
        @include("auth.forgot-password.form")

    </div>

@endsection
