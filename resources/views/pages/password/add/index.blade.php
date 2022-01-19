
@extends('layout.system')

@section('css')
@endsection

@section('pageContent')

    @include("layout.banner")

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        @include("pages.password.edit.form")

    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>
    <script src="{{ url('js/plugins/NovaPasswordViewer.js') }}"></script>

    <script src="{{ url('js/plugins/choices.js') }}"></script>
    <script >
        if (document.getElementById('choices-type-id')) {
            var typeElement = document.getElementById('choices-type-id');
            const typeSearch = new Choices(typeElement, {
                searchEnabled: true,
                searchPlaceholderValue: '{{ __("general.search-for", ["item" => __("general.type")]) }}',
                shouldSort: false,
            });
        };
    </script>

    <script src="{{ url('js/plugins/quill.js') }}"></script>
    <script>
        if (document.getElementById('edit-description-edit')) {
            var quill = new Quill('#edit-description-edit', {
                theme: 'snow'
            });
        };
    </script>

@endsection
