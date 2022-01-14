
@extends('layout.system')

@section('css')

    .pictureDefaultElement {
        display: none;
    }
    .pictureDefaultElement + label {
        opacity: 0.4;
        cursor: pointer;
        position: relative;
    }
    .pictureDefaultElement + label .text {
        display: none;
        position: absolute;
        top: 0;
        transform: translateY( 50% );
        right: 0;
        padding: 2px 10px 2px 15px;
        color: #ffffff;
        border-radius: .75rem 0 0 .75rem;
    }
    .pictureDefaultElement:checked + label {
        box-shadow: 0 0 0 4px #212229;
        opacity: 1;
        border-radius: .75rem;
    }
    .pictureDefaultElement:checked + label .text {
        display: block;
    }

@endsection

@section('pageContent')

    @include('layout.banner')

    @include('layout.sidebar.index')

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        @include("pages.user.edit.form")

    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>
    <script src="{{ url('js/plugins/NovaPasswordViewer.js') }}"></script>

@endsection
