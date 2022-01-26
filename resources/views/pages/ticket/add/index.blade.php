
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

        let quillInvoiceDescriptionEditElement = document.getElementById('quill-invoice-description-edit');
        if ( quillInvoiceDescriptionEditElement ) {

            let newElement = document.createElement("div");
            newElement.id = "quill-invoice-description-edit--container";
            newElement.classList.add("height-200");

            quillInvoiceDescriptionEditElement.style.display = "none";

            quillInvoiceDescriptionEditElement.parentNode.append( newElement );

            var quillInvoice = new Quill('#quill-invoice-description-edit--container', {
                theme: 'snow'
            });
            const delta = quillInvoice.clipboard.convert( quillInvoiceDescriptionEditElement.innerText );
            quillInvoice.setContents(delta, 'silent');
            quillInvoice.on('text-change', function() {
                quillInvoiceDescriptionEditElement.innerText = quillInvoice.root.innerHTML;
            });
        }
    </script>

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

        if (document.getElementById('choices-status')) {
            var statusElement = document.getElementById('choices-status');
            const statusSearch = new Choices(statusElement, {
                searchEnabled: true,
                searchPlaceholderValue: '{{ __("general.search-for", ["item" => __("general.status")]) }}',
                shouldSort: false,
            });
        };
    </script>

@endsection
