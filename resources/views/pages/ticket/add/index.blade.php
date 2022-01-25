
@extends('layout.system')

@section('css')
@endsection

@section('pageContent')

    @include("layout.banner")

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        @include("pages.ticket.edit.form")

    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>

@endsection
