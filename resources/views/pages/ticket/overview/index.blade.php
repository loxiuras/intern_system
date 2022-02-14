
@extends('layout.system')

@section('bodyAttributes', 'class=NovaPreloadSpinner data-time=1000')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/plugins/NovaPreloadSpinner.css') }}">

    <style>

        .ticketStatusBadgeElement {
            display: none;
        }
        .ticketStatusBadgeElement + label .ticketStatusBadge {
            opacity: 0.2;
            cursor: pointer;
            padding: 10px;
        }
        .ticketStatusBadgeElement:checked + label .ticketStatusBadge {
            opacity: 1;
            border: 2px solid var( --bs-gray-dark );
        }

    </style>
@endsection

@section('pageContent')

    @include('layout.banner')

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        <div class="container-fluid py-4">

            <div class="d-sm-flex justify-content-end">
                <div>
                    <a href="{{ Route('ticket-add') }}" class="btn btn-icon btn-outline-white">
                        + {{ __("general.add-new-item", ["item" => strtolower(__("general.ticket"))]) }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header mb-0 pb-0">

                            <form action="{{ Route('ticket-overview') }}" method="POST">
                                @csrf

                                <div class="row mt-3">

                                    <div class="col-12 col-sm-12">

                                        <label for="title" class="d-block w-100">{{ __("general.status") }}</label>
                                        <div class="d-inline-block">

                                            @for( $i = 0; $i <= 4; $i++ )
                                                <input type="radio" class="ticketStatusBadgeElement"
                                                       name="status"
                                                       value="{{ $i }}"
                                                       {{ isset( $searchData ) && isset( $searchData->status ) && $searchData->status === $i ? 'checked' : '' }}
                                                       id="status_{{ $i }}" />
                                                <label for="status_{{ $i }}">
                                                    <span class="ticketStatusBadge badge badge-lg {{ __("pages/ticket.status_". $i . ".className" ) }}"><i class="{{ __("pages/ticket.status_". $i . ".iconClassName" ) }} mx-1"></i> {{ __("pages/ticket.status_". $i . ".title") }}</span>
                                                </label>
                                            @endfor
                                        </div>

                                        <button type="submit" class="badge bg-dark mt-0 ms-3 mb-2 px-6">Filter</button>
                                    </div>

                                </div>
                            </form>

                        </div>

                        <div class="table-responsive mt-0 pt-0">

                            <table class="table table-flush" id="datatable-ticket-list">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{ __("general.company") }}</th>
                                    <th>{{ __("general.title") }}</th>
                                    <th>{{ __("general.scheduled_date") }}</th>
                                    <th>{{ __("general.price") }} / {{ __("general.time") }}</th>
                                    <th>{{ __("general.status") }}</th>
                                    <th data-sortable="false">{{ __("general.actions") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $ticketsData as $ticket )

                                    <tr style="{{ $ticket->status === 4 ? 'background-color: #FAFAFA;' : '' }}">
                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $ticket->companyName }}</span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $ticket->title }}</span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">
                                                <span class="d-none">{{ $ticket->scheduled_date }}</span>
                                                {{ (new \App\Services\DateService( $ticket->scheduled_date ))->translate() }}
                                                @if ( $ticket->scheduled_date !== $ticket->scheduled_end_date )
                                                    -
                                                    {{ (new \App\Services\DateService( $ticket->scheduled_end_date ))->translate() }}
                                                @endif
                                            </span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">
                                                @php
                                                    if ( !empty( $ticket->invoice_price ) ) echo (new \App\Services\PriceService( (int)$ticket->invoice_price ))->transform();
                                                    echo "&nbsp;";
                                                    if ( !empty( $ticket->invoice_time ) ) echo "(" . (new \App\Services\TimeService( (int)$ticket->invoice_time ))->transform() . ")";
                                                @endphp
                                            </span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">
                                                <span class="d-none">{{ $ticket->status }}</span>
                                                <span class="badge {{ __("pages/ticket.status_". $ticket->status . ".className" ) }}">{{ __("pages/ticket.status_". $ticket->status . ".title") }}</span>

                                                @if( 1 === (int)$ticket->invoice )
                                                    <span class="badge bg-gradient-light ms-2 text-dark">{{ __("general.invoiced") }}</span>
                                                @endif
                                            </span>
                                        </td>

                                        <td class="text-xs">
                                            @if( 4 > $ticket->status )
                                                <a href="{{ Route('ticket-edit', ['id' => $ticket->id]) }}" data-bs-toggle="tooltip">
                                                    <i class="fas fa-edit text-secondary"></i>
                                                </a>
                                            @endif

                                            @if( 3 === $ticket->status )
                                                <a href="{{ Route('ticket-small-edit', ['id' => $ticket->id]) }}" class="mx-3 NovaModel timeout" data-nova-model-body-class="modal-open" data-nova-model-target="invoiceModel" style="cursor: pointer;">
                                                    <i class="fas fa-paper-plane text-dark"></i>
                                                </a>
                                            @endif

                                            @if( 4 === $ticket->status && 0 === (int)$ticket->invoice )
                                                <a href="{{ Route('ticket-small-edit', ['id' => $ticket->id]) }}" class="@if(3 >= $ticket->status) mx-3 @endif">
                                                    <i class="fas fa-paper-plane text-dark"></i>
                                                </a>
                                            @endif

                                            @if( 4 === $ticket->status )

                                                <form class="@if(4 === $ticket->status && 0 === (int)$ticket->invoice) mx-3 @endif" action="{{ Route('ticket-reset', ['id' => $ticket->id]) }}" method="POST" title="{{ $ticket->id }}" style="display: inline-block;">
                                                    @csrf

                                                    <label for="resetSubmit{{$ticket->id}}">
                                                        <span data-bs-toggle="tooltip" data-bs-original-title="Delete ticket" style="cursor: pointer;">
                                                            <i class="fas fa-undo text-dark"></i>
                                                        </span>
                                                    </label>

                                                    <input type="hidden" value="1" name="status" id="status" />
                                                    <input id="resetSubmit{{$ticket->id}}" name="resetSubmit{{$ticket->id}}" type="submit" style="display: none" />
                                                </form>
                                            @endif

                                            @if( 3 > $ticket->status )

                                                    <form class="mx-3" action="{{ Route('ticket-delete', ['id' => $ticket->id]) }}" method="POST" title="{{ $ticket->id }}" style="display: inline-block;">
                                                        @method('delete')
                                                        @csrf

                                                        <label for="deleteSubmit{{$ticket->id}}">
                                                            <span data-bs-toggle="tooltip" data-bs-original-title="Delete ticket" style="cursor: pointer;">
                                                                <i class="fas fa-trash text-secondary"></i>
                                                            </span>
                                                        </label>

                                                        <input id="deleteSubmit{{$ticket->id}}" name="deleteSubmit{{$ticket->id}}" type="submit" style="display: none" />
                                                    </form>

                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>
    <script src="{{ url('js/plugins/NovaPreloadSpinner.js') }}"></script>

    <script src="{{ url('js/plugins/datatables.js') }}"></script>
    <script>
        if (document.getElementById('datatable-ticket-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-ticket-list", {
                searchable: true,
                perPageSelect: false,
                perPage: 20,
            });
        }
    </script>

@endsection
