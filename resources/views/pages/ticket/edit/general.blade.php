
<form method="POST" action="{{ Route("ticket-store") }}" class="multisteps-form__form mb-1">
    @csrf

    <input type="hidden" name="id" id="id" value="{{ isset($ticketData->id) ? $ticketData->id : 0 }}">

    <div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

        <h5 class="font-weight-bolder mb-0">{!! __("pages/ticket.content.add.title") !!}</h5>
        <p class="mb-0 text-sm">{!! __("pages/ticket.content.add.description") !!}</p>

        <div class="multisteps-form__content">

            <div class="row mt-3">

                <div class="col-12 col-sm-6">
                    <label for="title">{{ __("general.title") }}</label>
                    <input class="multisteps-form__input form-control @error('title') is-invalid @enderror"
                           type="text"
                           name="title"
                           id="title"
                           value="{{ old('title', (isset($ticketData->title) ? $ticketData->title : ""))  }}"
                           placeholder="" />

                    @error('title')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6">
                    <label for="company_id">{{ __("general.company") }}</label>
                    <select name="company_id" id="choices-company-id" class="multisteps-form__input form-control @error('company_id') is-invalid @enderror">
                        <option value="0" disabled selected>{{ __("general.select-item", ["item" => strtolower(__("general.company"))]) }}</option>
                        @foreach( $companiesData as $company )
                            <option value="{{ $company->id }}" @if( !empty( $ticketData->company_id ) && $company->id === $ticketData->company_id ) selected="selected" @endif>{{ $company->name }}</option>
                        @endforeach
                    </select>

                    @error('company_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-12 col-sm-12">
                    <label for="description">{{ __("general.description") }}</label>
                    <div>
                        <textarea name="description" id="quill-description-edit" class="height-200">{{ old('description', (isset($ticketData->description) ? $ticketData->description : "")) }}</textarea>
                    </div>

                    @error('description')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-12 col-sm-12">
                    <label for="invoice-description">{{ __("general.invoice-description") }}</label>
                    <div>
                        <textarea name="invoice_description" id="quill-invoice-description-edit" class="height-200">{{ old('invoice_description', (isset($ticketData->invoice_description) ? $ticketData->invoice_description : "")) }}</textarea>
                    </div>

                    @error('invoice_description')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            @if( isset($ticketData->id) && $ticketData->id > 0 )

                <div class="row mt-3">

                    <div class="col-12 col-sm-6">
                        <label for="status">{{ __("general.status") }}</label>
                        <select name="status" id="choices-status" class="multisteps-form__input form-control @error('status') is-invalid @enderror">
                            @for( $i = 1; $i <= 4; $i++ )
                                <option value="{{ $i }}" {{ isset( $ticketData->status ) && $i === $ticketData->status ? 'selected' : '' }}>{{ __("pages/ticket.status_". $i . ".title") }}</option>
                            @endfor
                        </select>
                    </div>

                </div>

            @endif

            <div class="row mt-5">

                <div class="col-12 col-sm-6">
                    <label for="invoice_price">{{ __("general.price") }}</label>
                    <p class="form-text text-muted text-xs ms-1">
                        {!! __("pages/ticket.price--subtext") !!}
                    </p>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                            <input class="multisteps-form__input form-control @error('invoice_price') is-invalid @enderror"
                                   type="text"
                                   name="invoice_price"
                                   id="invoice_price"
                                   value="{{ (new \App\Services\PriceService( old('invoice_price', (isset($ticketData->invoice_price) ? $ticketData->invoice_price : 0)) ))->transform( false ) }}"
                                   placeholder="" />
                        </div>
                    </div>

                    @error('price')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6">
                    <label for="invoice_time">{{ __("general.time") }} <span class="text-lowercase">( {{ __("general.hours") }} + {{ __("general.minutes") }} )</span></label>
                    <p class="form-text text-muted text-xs ms-1">
                        {!! __("pages/ticket.time--subtext") !!}
                    </p>
                    <div class="row">

                        <div class="col-6">
                            <input class="multisteps-form__input form-control @error('invoice_time') is-invalid @enderror"
                                   type="number"
                                   name="invoice_time_hours"
                                   id="invoice_time_hours"
                                   min="0"
                                   value="{{ old('invoice_time_hours', (isset($ticketData->invoice_time_hours) ? $ticketData->invoice_time_hours : ""))  }}"
                                   placeholder="{{ __("general.hours") }}" />
                        </div>

                        <div class="col-6">
                            <input class="multisteps-form__input form-control @error('invoice_time') is-invalid @enderror"
                                   type="number"
                                   name="invoice_time_minutes"
                                   id="invoice_time_minutes"
                                   min="0"
                                   max="59"
                                   value="{{ old('invoice_time_minutes', (isset($ticketData->invoice_time_minutes) ? $ticketData->invoice_time_minutes : ""))  }}"
                                   placeholder="{{ __("general.minutes") }}" />
                        </div>

                    </div>

                    @error('time')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-12 col-sm-6">
                    <label for="scheduled_date">{{ __("general.scheduled_date") }}</label>
                    <p class="form-text text-muted text-xs ms-1">
                        {!! __("pages/ticket.scheduled_date--subtext") !!}
                    </p>
                    <input class="multisteps-form__input form-control @error('scheduled_date') is-invalid @enderror"
                           type="text"
                           name="scheduled_date"
                           id="scheduled_date"
                           data-date="{{ old('scheduled_date', (isset($ticketData->scheduled_date) ? $ticketData->scheduled_date : "")) }}"
                           value="{{ old('scheduled_date', (isset($ticketData->scheduled_date) ? $ticketData->scheduled_date : "")) }}"
                           placeholder="" />

                    @error('scheduled_date')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6">
                    <label for="scheduled_date">{{ __("general.scheduled_end_date") }}</label>
                    <p class="form-text text-muted text-xs ms-1">
                        {!! __("pages/ticket.scheduled_end_date--subtext") !!}
                    </p>
                    <input class="multisteps-form__input form-control @error('scheduled_end_date') is-invalid @enderror"
                           type="text"
                           name="scheduled_end_date"
                           id="scheduled_end_date"
                           value="{{ old('scheduled_end_date', (isset($ticketData->scheduled_end_date) ? $ticketData->scheduled_end_date : ""))  }}"
                           placeholder="" />

                    @error('scheduled_end_date')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
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
                            title="Next">{{ __("general.save", ["item" => strtolower(__("general.ticket"))]) }}</button>
                </div>

            </div>

        </div>

    </div>

</form>
