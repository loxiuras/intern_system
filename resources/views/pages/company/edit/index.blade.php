
@extends('layout.system')

@section('css')

    .choices {
        width: 100%;
    }

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

    <script src="{{ url('js/plugins/choices.js') }}"></script>
    <script >
        if (document.getElementById('choices-user-id')) {
            var element = document.getElementById('choices-user-id');
            const example = new Choices(element, {
                searchEnabled: true,
                searchPlaceholderValue: '{{ __("general.search-for", ["item" => __("general.name")]) }}',
                shouldSort: false,
            });
        };
    </script>
@endsection
