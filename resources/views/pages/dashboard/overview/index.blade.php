
@extends('layout.system')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/plugins/NovaPreloadSpinner.css') }}">
@endsection

@section('css')

    .fc .fc-daygrid-day.fc-day-today {
        background-color: #F1F1F1;
        background-image: linear-gradient(310deg, #F1F1F1 0%, #EAEAEA 100%);
    }

    .fc-daygrid-event {
        white-space: normal !important;
        align-items: normal !important;
    }

    .ticketElement:hover .ticketView {
        display: block !important;
    }

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
                                                    <span class="text-sm text-normal">{!! __("pages/dashboard.info.user.subtext") !!}</span>
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
                                                    <span class="text-sm text-normal">{!! __("pages/dashboard.info.company.subtext") !!}</span>
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
                                                    <span class="text-sm text-normal">{!! __("pages/dashboard.info.domain.subtext") !!}</span>
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
                                                    <span class="text-sm text-normal">{!! __("pages/dashboard.info.ticket.subtext") !!}</span>
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

            @if( isset( $planningRows ) && count( $planningRows ) > 0 )
                <div class="row mt-6 mb-6">

                    @foreach( $planningRows as $row )

                        <div class="col-3">

                            <div class="card widget-calendar h-100">

                                <div class="card-header position-relative">
                                    <div class="position-absolute top-0 bottom-0 z-index-0 opacity-2" style="border-radius: 1rem 1rem 0 0; left: 0; right: 0; background-image: url({{ url( "img/banners/banner-". $row->pictureDefaultId .".png" ) }}); background-size: cover;"></div>

                                    <span class="d-block text-dark text-center w-100 z-index-3 position-relative">
                                        <b>{{ $row->fullName }}</b>
                                    </span>
                                </div>

                                <div class="card-body p-3">
                                    @if( !empty( $row->tickets ) && $row->tickets->count() )
                                        @foreach( $row->tickets as $ticket )

                                            <div class="ticketElement w-100 badge mb-2 p-3 position-relative text-dark border-1 border-success">

                                                <span class="d-block w-100 text-left">
                                                    <span class="mb-3 d-block">
                                                        {{ $ticket->companyName }}
                                                    </span>
                                                    <span class="d-block text-capitalize">
                                                        {{ $ticket->title }}
                                                    </span>
                                                </span>

                                                <hr>

                                                <span class="d-block" style="text-transform: initial;">
                                                    <i class="fas fa-calendar-alt mx-1"></i>

                                                    @if( $ticket->scheduled_date === $ticket->scheduled_end_date || empty( $ticket->scheduled_end_date ) )
                                                        {{ __("general.start-from") }}
                                                    @endif

                                                    {{ (new \App\Services\DateService( $ticket->scheduled_date ))->translate() }}
                                                    @if( $ticket->scheduled_date !== $ticket->scheduled_end_date )
                                                        - {{ (new \App\Services\DateService( $ticket->scheduled_end_date ))->translate() }}
                                                    @endif
                                                </span>

                                                <a href="{{ Route("ticket-edit", ["id" => $ticket->ticket_id]) }}" class="ticketView position-absolute d-none" style="bottom: 10px; right: 20px;">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                            </div>

                                        @endforeach
                                    @endif
                                </div>

                            </div>

                        </div>

                    @endforeach

                    <div class="col-12">

                        <div class="d-flex justify-content-center mt-4">

                            @for( $i = 1; $i <= 3; $i++ )
                                <label class="ms-2">
                                    <span class="ticketStatusBadge badge badge-lg {{ __("pages/ticket.status_". $i . ".className" ) }}"><i class="{{ __("pages/ticket.status_". $i . ".iconClassName" ) }} mx-1"></i> {{ __("pages/ticket.status_". $i . ".title") }}</span>
                                </label>
                            @endfor

                        </div>

                    </div>

                </div>
            @endif

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card widget-calendar h-100">
                        <div class="card-header p-3 pb-0 mt-2 mb-2 position-relative w-100 d-flex justify-content-center align-items-start">
                            <h6 class="mb-0 text-dark d-block text-center">
                                {{ __("general.months.". $calendarInfo->month) }} {{ $calendarInfo->year }}
                                <a class="d-block w-100 text-sm text-normal"
                                   href='{{ Route('dashboard', ['date' => $calendarInfo->currentDate ]) }}'><i class="fas fa-undo" style="font-size: 10px;"></i> {{ __('general.back-to-current-month') }}</a>
                            </h6>
                            <a class="arrow position-absolute cursor-pointer info-hover-info text-sm text-normal"
                               href="{{ Route('dashboard', ['date' => $calendarInfo->prevMonthDate ]) }}"
                               style="top: 20px;left: 30px;">
                                <i class="fas fa-arrow-left mx-1"></i>{{ __("general.prev-month") }}
                            </a>
                            <a class="arrow position-absolute cursor-pointer info-hover-info text-sm text-normal"
                               href="{{ Route('dashboard', ['date' => $calendarInfo->nextMonthDate]) }}"
                               style="top: 20px;right: 30px;">
                                {{ __("general.next-month") }}<i class="fas fa-arrow-right mx-1"></i>
                            </a>
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

            let calendar = new FullCalendar.Calendar(calendarEl, {
                contentHeight: 'auto',
                initialView: 'dayGridMonth',
                initialDate: '{{ $calendarInfo->date }}',
                headerToolbar: false,

                weekends: false,
                eventClick: function( element ) {
                    let ticketEditRoute = '{{ Route('ticket-edit', ['id' => 99999]) }}';
                    let ticketId = element.event._def.extendedProps.ticketId;

                    if ( ticketId ) {
                        window.location.href = ticketEditRoute.replace( '99999', ticketId );
                    }
                },
                createEvent: function (event) {

                    console.log( event );
                    console.log( element );

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
                                title: '{{ $ticket->status >= 3 ? '✔' : '' }} {{ $ticket->companyName }} - {{ $ticket->totalTitle }}',
                                start: '{{ $ticket->date }}',
                                end: '{{ $ticket->endDate }}',
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
