
@extends('layout.system')

@section('css')

@endsection

@section('pageContent')

    @include("layout.banner")

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        @include("pages.company.edit.form")

        @if( isset($companyData->id) )
            @include("pages.company.edit.connect-user")
        @endif

    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>
    <script src="{{ url('js/plugins/NovaPasswordViewer.js') }}"></script>
    <script src="{{ url('js/plugins/NovaModel.js') }}"></script>

@endsection
