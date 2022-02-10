
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
                    <div class="card widget-calendar h-100 pt-3">
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

            let calendar = new FullCalendar.Calendar(calendarEl, {
                contentHeight: 'auto',
                initialView: 'dayGridMonth',
                selectable: true,
                initialDate: new Date(),
                editable: true,
                headerToolbar: false,
                weekends: false,
                eventClick: function( element ) {
                    let ticketEditRoute = '{{ Route('ticket-edit', ['id' => 99999]) }}';
                    let ticketId = element.event._def.extendedProps.ticketId;

                    if ( ticketId ) {
                        window.location.href = ticketEditRoute.replace( '99999', ticketId );
                    }
                },
                events: [
                    @if( $calendarInfo && count( $calendarInfo->birthdays ) > 0 )
                        @foreach( $calendarInfo->birthdays as $birthday )
                            {
                                title: '🎁 {{ $birthday->name }} ({{ $birthday->year }}) {{ $birthday->isMoved ? '- 📅'. $birthday->birthDayDate . 'e' : '' }}',
                                start: '{{ $birthday->date }}',
                                end: '{{ $birthday->date }}',
                                className: 'bg-gradient-dark',
                            },
                        @endforeach
                    @endif

                    @if( $calendarInfo && count( $calendarInfo->tickets ) > 0 )
                        @foreach( $calendarInfo->tickets as $ticket )
                            {
                                ticketId: {{ $ticket->id }},
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
    </script>

@endsection
