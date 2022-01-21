
@extends('layout.system')

@section('css')

    .choices {
        width: 100%;
    }

    .domainHover:hover {
        color: var( --bs-primary ) !important;
        font-weight: 600;
    }

    .domainHover .domainHoverIcon {
        display: none;
    }

    .domainHover:hover .domainHoverIcon {
        display: inline-block;
    }

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

        @include("pages.company.edit.form")

        @if( isset($companyData->id) )
            @include("pages.company.edit.connect-user")
        @endif

    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>
    <script src="{{ url('js/plugins/NovaPasswordViewer.js') }}"></script>
    <script src="{{ url('js/plugins/NovaTextSwitcher.js') }}"></script>
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
