
@extends('layout.system')

@section('css')

    .lightLink {
        color: #aaaaaa !important;
    }
    .lightLink i {
        color: #aaaaaa;
    }
    .lightLink:hover {
        color: #676767 !important;
    }

@endsection

@section('pageContent')

    @include("layout.banner")

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        @include("pages.domain.edit.form")

    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>
    <script src="{{ url('js/plugins/NovaTextSwitcher.js') }}"></script>

    <script src="{{ url('js/plugins/choices.js') }}"></script>
    <script >
        if (document.getElementById('choices-company-id')) {
            var companyElement = document.getElementById('choices-company-id');
            const companySearch = new Choices(companyElement, {
                searchEnabled: true,
                searchPlaceholderValue: '{{ __("general.search-for", ["item" => __("general.company")]) }}',
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-parent-id')) {
            var parentElement = document.getElementById('choices-parent-id');
            const parentSearch = new Choices(parentElement, {
                searchEnabled: true,
                searchPlaceholderValue: '{{ __("general.search-for", ["item" => __("general.domain")]) }}',
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-host-id')) {
            var hostElement = document.getElementById('choices-host-id');
            const hostSearch = new Choices(hostElement, {
                searchEnabled: true,
                searchPlaceholderValue: '{{ __("general.search-for", ["item" => __("general.domain")]) }}',
                shouldSort: false,
            });
        };
    </script>

@endsection
