
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

        let quillDescriptionEditElement = document.getElementById('quill-description-edit');
        if ( quillDescriptionEditElement ) {

            let newElement = document.createElement("div");
            newElement.id = "quill-description-edit--container";
            newElement.classList.add("height-200");

            quillDescriptionEditElement.style.display = "none";

            quillDescriptionEditElement.parentNode.append( newElement );

            var quill = new Quill('#quill-description-edit--container', {
                theme: 'snow'
            });
            const delta = quill.clipboard.convert( quillDescriptionEditElement.innerText );
            quill.setContents(delta, 'silent');
            quill.on('text-change', function() {
                quillDescriptionEditElement.innerText = quill.root.innerHTML;
            });
        }
    </script>

@endsection
