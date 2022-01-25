
@extends('layout.system')

@section('bodyAttributes', 'class=NovaPreloadSpinner data-time=1000')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/plugins/NovaPreloadSpinner.css') }}">
@endsection

@section('pageContent')

    @include('layout.banner')

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        <div class="container-fluid py-4">

            <div class="d-sm-flex justify-content-end">
                <div>
                    <a href="{{ Route('domain-add') }}" class="btn btn-icon btn-outline-white">
                        + {{ __("general.add-new-item", ["item" => strtolower(__("general.ticket"))]) }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <div class="table-responsive">

                            <table class="table table-flush" id="datatable-ticket-list">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{ __("general.company") }}</th>
                                    <th>{{ __("general.title") }}</th>
                                    <th>{{ __("general.description") }}</th>
                                    <th>{{ __("general.invoice-description") }}</th>
                                    <th>{{ __("general.price") }} / {{ __("general.time") }}</th>
                                    <th>{{ __("general.status") }}</th>
                                    <th data-sortable="false">{{ __("general.actions") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $ticketsData as $ticket )

                                    <tr>
                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $ticket->companyName }}</span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $ticket->title }}</span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs"></span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs"></span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">
                                                @php
                                                    if ( !empty( $ticket->invoice_price ) ) echo (new \App\Services\PriceService( (int)$ticket->invoice_price ))->transform();
                                                    else echo "Free";
                                                    if ( !empty( $ticket->invoice_time ) ) echo "&nbsp;/&nbsp;" . (new \App\Services\TimeService( (int)$ticket->invoice_time ))->transform();
                                                @endphp

{{--                                                {{ $ticket->invoice_time }}--}}
                                            </span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $ticket->status }}</span>
                                        </td>

                                        <td class="text-xs">
                                            <a href="{{ Route('ticket-edit', ['id' => $ticket->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit ticket">
                                                <i class="fas fa-edit text-secondary"></i>
                                            </a>
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

            });
        }
    </script>

@endsection
