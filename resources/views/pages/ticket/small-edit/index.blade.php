

@extends('layout.system')

@section('css')
@endsection

@section('pageContent')

    @include("layout.banner")

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="multisteps-form mb-5">
                        <div class="row">
                            <div class="col-12 col-lg-6 m-auto">

                                <form method="POST" action="{{ Route("ticket-small-store") }}" class="multisteps-form__form mb-1">
                                    @csrf

                                    <input type="hidden" name="id" id="id" value="{{ isset($ticketData->id) ? $ticketData->id : 0 }}">

                                    <div class="card p-5 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-12">
                                                <span class="text-bold text-primary">{{ __("general.company") }}</span>
                                                <span class="d-block text-normal">{{ $ticketData->companyName }}</span>
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col-12 col-sm-4">
                                                <span class="text-dark text-bold">{{ __("general.created-by") }}</span>
                                                <span class="d-block text-normal">
                                                    {{ $ticketData->createdUserName }}{{ !empty( $ticketData->createdUserInsertion ) ? " {$ticketData->createdUserInsertion} " : " " }}{{ $ticketData->createdUserLastName }}
                                                </span>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <span class="text-dark text-bold">{{ __("general.updated-by") }}</span>
                                                <span class="d-block text-normal">
                                                    {{ $ticketData->updatedUserName }}{{ !empty( $ticketData->updatedUserInsertion ) ? " {$ticketData->createdUserInsertion} " : " " }}{{ $ticketData->updatedUserLastName }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col-12 col-sm-12">
                                                <span class="text-dark text-bold">{{ __("general.title") }}</span>
                                                <span class="d-block text-normal">{{ $ticketData->title }}</span>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-12">
                                                <span class="text-dark text-bold">{{ __("general.description") }}</span>
                                                <span class="d-block text-normal">{!! $ticketData->description !!}</span>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-12">
                                                <span class="text-primary text-bold">{{ __("general.invoice-description") }}</span>
                                                <span class="d-block text-primary">{!! $ticketData->invoice_description !!}</span>
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col-12 col-sm-4">
                                                <span class="text-dark text-bold">{{ __("general.price") }}</span>
                                                <span class="d-block text-normal">{!! (new \App\Services\PriceService( $ticketData->invoice_price ))->transform() !!}</span>
                                            </div>

                                            <div class="col-12 col-sm-4">
                                                <span class="text-dark text-bold">{{ __("general.time") }}</span>
                                                <span class="d-block text-normal">
                                                    {{ (new \App\Services\TimeService( $ticketData->invoice_time ))->transform() }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row mt-5">

                                            <div class="col-12 col-sm-4">
                                                <span class="text-dark text-bold">{{ __("general.invoice") }}?</span>
                                                <p class="form-text text-muted text-xs">
                                                    {!! __("pages/ticket.invoice--subtext") !!}
                                                </p>
                                                <div class="form-check form-switch ms-1">
                                                    <input class="form-check-input" type="checkbox" id="invoice" name="invoice" {{ isset( $ticketData->invoice ) && 1 === $ticketData->invoice ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="invoice"></label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mt-3">

                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light ms-auto mb-0 js-btn-next"
                                                        type="button"
                                                        onclick="window.location = '{{ Route('ticket-overview') }}'"
                                                        title="Prev">{{ __( "general.back-to", ["location" => strtolower( __("general.overview") )] ) }}</button>

                                                <button class="btn bg-gradient-dark ms-2 mb-0 js-btn-next"
                                                        type="submit"
                                                        title="Next">{{ __("general.update", ["item" => strtolower( __("general.ticket") )]) }}</button>
                                            </div>

                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>

@endsection

