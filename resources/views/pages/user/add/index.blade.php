
@extends('layout.system')

@section('pageContent')

    <div class="min-height-300 bg-primary position-absolute w-100 bannerBackground"></div>

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        @include("pages.user.add.form")

    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>
    <script src="{{ url('js/plugins/NovaPasswordViewer.js') }}"></script>

@endsection
