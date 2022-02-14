
@extends('layout.system')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/plugins/datepicker.css') }}">
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

    <script src="{{ url('js/plugins/datepicker.js') }}"></script>
    <script>

        let days = [
            '{{ __('general.weekdays.7') }}',
            @for($i = 1; $i < 7; $i++) '{{ __('general.weekdays.'. $i) }}', @endfor
        ];
        let daysShort = [
            '{{ __('general.weekdays-short.7') }}',
            @for($i = 1; $i < 7; $i++) '{{ __('general.weekdays-short.'. $i) }}', @endfor
        ];
        let months = [
            @for($i = 1; $i <= 12; $i++) '{{ __('general.months.'. $i) }}', @endfor
        ];
        let monthsShort = [
            @for($i = 1; $i <= 12; $i++) '{{ __('general.months-short.'. $i) }}', @endfor
        ];

        const elem2 = document.querySelector('input[name="scheduled_end_date"]');
        const datepicker2 = new Datepicker(elem2, {
            format: {
                toValue(date, format, locale) {
                    locale.days = days;
                    locale.daysMin = daysShort;
                    locale.daysShort = daysShort;
                    locale.months = months;
                    locale.monthsShort = monthsShort;
                    return new Date(date);
                },
                toDisplay(date, format, locale) {
                    let dateObject = (new Date(date));
                    let day = String(dateObject.getDate());
                    let month = String(dateObject.getMonth() + 1);
                    return ( day.length === 1 ? "0" + day : day ) + "-" + ( month.length === 1 ? "0" + month : month ) + "-" + dateObject.getFullYear();
                },
            },

        });

        const elem = document.querySelector('input[name="scheduled_date"]');
        const datepicker = new Datepicker(elem, {
            format: {
                toValue(date, format, locale) {
                    locale.days = days;
                    locale.daysMin = daysShort;
                    locale.daysShort = daysShort;
                    locale.months = months;
                    locale.monthsShort = monthsShort;
                    return new Date(date);
                },
                toDisplay(date, format, locale) {
                    let endDate = elem2.value;
                    let endDateParts = endDate.split("-");
                    endDateParts.reverse();
                    endDate = endDateParts.join("-");

                    let dateObject = (new Date(date));
                    let day = String(dateObject.getDate());
                    let month = String(dateObject.getMonth() + 1);
                    let completeDate = ( day.length === 1 ? "0" + day : day ) + "-" + ( month.length === 1 ? "0" + month : month ) + "-" + dateObject.getFullYear();

                    if ( date > new Date( endDate ) ) {
                        elem2.value = completeDate;
                    }
                    return completeDate;
                },
            },

        });

    </script>

@endsection
