
@extends('layout.system')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/plugins/NovaPreloadSpinner.css') }}">
@endsection

@section('pageContent')

    @include('layout.banner')

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg ps">

        @include("layout.nav.index")

        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-body p-3">

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                                    {!! __("pages/dashboard.info.user.title") !!}
                                                </p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $userInfo->totalCount }}
                                                </h5>
                                                <p class="mb-0">
                                                    <span class="@if( $userInfo->monthCount > 0 ) text-success @elseif ( $userInfo->monthCount < 0 ) text-danger @else text-dark @endif text-sm font-weight-bolder">
                                                        {{ $userInfo->monthCount }}
                                                    </span>
                                                    {!! __("pages/dashboard.info.user.subtext") !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                                <i class="ni ni-app text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-body p-3">

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                                    {!! __("pages/dashboard.info.company.title") !!}
                                                </p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $companyInfo->totalCount }}
                                                </h5>
                                                <p class="mb-0">
                                                    <span class="@if( $companyInfo->monthCount > 0 ) text-success @elseif ( $companyInfo->monthCount < 0 ) text-danger @else text-dark @endif text-sm font-weight-bolder">
                                                        @if( $companyInfo->monthCount > 0 )+@endif{{ $companyInfo->monthCount }}
                                                    </span>
                                                    {!! __("pages/dashboard.info.company.subtext") !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div class="icon icon-shape bg-gradient-danger shadow-primary text-center rounded-circle">
                                                <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                                    {!! __("pages/dashboard.info.domain.title") !!}
                                                </p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $domainInfo->totalCount }}
                                                </h5>
                                                <p class="mb-0">
                                                    <span class="@if( $domainInfo->monthCount > 0 ) text-success @elseif ( $domainInfo->monthCount < 0 ) text-danger @else text-dark @endif text-sm font-weight-bolder">
                                                        @if( $domainInfo->monthCount > 0 )+@endif{{ $domainInfo->monthCount }}
                                                    </span>
                                                    {!! __("pages/dashboard.info.domain.subtext") !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div class="icon icon-shape bg-gradient-success shadow-danger text-center rounded-circle">
                                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                                    {!! __("pages/dashboard.info.ticket.title") !!}
                                                </p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $ticketInfo->totalCount }}
                                                </h5>
                                                <p class="mb-0">
                                                    <span class="@if( $ticketInfo->monthCount > 0 ) text-success @elseif ( $ticketInfo->monthCount < 0 ) text-danger @else text-dark @endif text-sm font-weight-bolder">
                                                        @if( $ticketInfo->monthCount > 0 )+@endif{{ $ticketInfo->monthCount }}
                                                    </span>
                                                    {!! __("pages/dashboard.info.ticket.subtext") !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div class="icon icon-shape bg-gradient-info shadow-danger text-center rounded-circle">
                                                <i class="ni ni-book-bookmark text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card widget-calendar h-100">
                        <div class="card-header p-3 pb-0">
                            <h6 class="mb-0">Calendar</h6>
                        </div>
                        <div class="card-body p-3">
                            <div data-toggle="widget-calendar"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>

    <script src="{{ url('js/plugins/fullcalendar.js') }}"></script>
    <script>

        if (document.querySelector('[data-toggle="widget-calendar"]')) {
            let calendarEl = document.querySelector('[data-toggle="widget-calendar"]');
            let today = new Date();

            const weekday = [ @for( $i = 1; $i <= 7; $i++) '{{ __("general.weekdays.". $i) }}', @endfor ];
            const months = [ @for( $i = 1; $i <= 12; $i++) '{{ __("general.months.". $i) }}', @endfor ];

            let calendar = new FullCalendar.Calendar(calendarEl, {
                contentHeight: 'auto',
                initialView: 'dayGridMonth',
                selectable: true,
                initialDate: new Date(),
                editable: true,
                headerToolbar: false,
                events: [
                    @if( $calendarInfo && count( $calendarInfo->birthdays ) > 0 )
                        @foreach( $calendarInfo->birthdays as $birthday )
                            {
                                title: '🎁 {{ $birthday->name }} ({{ $birthday->year }})',
                                start: '{{ $birthday->date }}',
                                end: '{{ $birthday->date }}',
                                className: 'bg-gradient-dark'
                            },
                        @endforeach
                    @endif

                    @if( $calendarInfo && count( $calendarInfo->tickets ) > 0 )
                        @foreach( $calendarInfo->tickets as $ticket )
                            {
                                title: '{{ $ticket->status >= 3 ? '✔' : '' }} {{ $ticket->companyName }} - {{ $ticket->title }}',
                                start: '{{ $ticket->date }}',
                                end: '{{ $ticket->date }}',
                                className: '{{ $ticket->status >= 3 ? 'bg-gradient-success mb-1' : 'bg-gradient-primary mb-1' }}'
                            },
                        @endforeach
                    @endif
                ],
            });
            calendar.render();
        }

        /*
        if (document.querySelector('[data-toggle="widget-calendar"]')) {
            var calendarEl = document.querySelector('[data-toggle="widget-calendar"]');
            var today = new Date();
            var mYear = today.getFullYear();
            var weekday = ["Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag"];
            var months = ["januari", "febuari", "maart", "april", "mei", "juni", "juli", "ausgustus", "september", "oktober", "november", "december"];
            var mDay = weekday[today.getDay()];
            var mMonth = months[today.getMonth()];

            var m = today.getMonth();
            var d = today.getDate();
            document.getElementsByClassName('widget-calendar-year')[0].innerHTML = mYear;
            document.getElementsByClassName('widget-calendar-month')[0].innerHTML = mMonth;
            document.getElementsByClassName('widget-calendar-day')[0].innerHTML = mDay;

            var calendar = new FullCalendar.Calendar(calendarEl, {
                contentHeight: 'auto',
                initialView: 'dayGridMonth',
                selectable: true,
                initialDate: '2020-12-01',
                editable: true,
                weekNumbers: true,
                headerToolbar: false,
                    events: [{
                        title: 'Carel: Call with Dave',
                        start: '2020-12-03',
                        end: '2020-12-03',
                        className: 'bg-gradient-info'
                    },

                    {
                        title: 'Peter: Lunch meeting',
                        start: '2020-12-01',
                        end: '2020-12-01',
                        className: 'bg-gradient-danger'
                    },

                    {
                        title: 'Wesley: All day conference',
                        start: '2020-12-05',
                        end: '2020-12-05',
                        className: 'bg-gradient-dark'
                    },

                    {
                        title: 'Peter: Winter Hackaton',
                        start: '2020-12-03',
                        end: '2020-12-03',
                        className: 'bg-gradient-danger'
                    },

                    {
                        title: 'Carel: Digital event',
                        start: '2020-12-07',
                        end: '2020-12-09',
                        className: 'bg-gradient-info'
                    },


                ]
            });
            calendar.render();
        }*/
    </script>

@endsection
