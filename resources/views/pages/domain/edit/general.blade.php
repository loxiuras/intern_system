
<form method="POST" action="{{ Route("domain-store") }}" class="multisteps-form__form mb-1">
    @csrf

    <input type="hidden" name="id" id="id" value="{{ isset($domainData->id) ? $domainData->id : 0 }}">

    <div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

        <h5 class="font-weight-bolder mb-0">{!! __("pages/domain.content.add.title") !!}</h5>
        <p class="mb-0 text-sm">{!! __("pages/domain.content.add.description") !!}</p>

        <div class="multisteps-form__content">

            <div class="row mt-3">

                <div class="col-12 col-sm-6">
                    <label for="name">{{ __("general.name") }}</label>
                    <input class="multisteps-form__input form-control @error('name') is-invalid @enderror"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name', (isset($domainData->name) ? $domainData->name : ""))  }}"
                           placeholder="" />

                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-sm-6">
                    <label for="company_id">{{ __("general.parent") }}</label>
                    <select name="parent_id" id="choices-parent-id" class="multisteps-form__input form-control @error('parent_id') is-invalid @enderror">
                        <option value="0">{{ __("general.no-choice") }}</option>
                        @foreach( $domainsData as $domain )
                            @if( !empty( $domainData->parent_id ) && $domain->id === $domainData->parent_id )
                                <option value="{{ $domain->id }}" selected="selected">{{ $domain->name }}</option>
                            @else
                                <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('parent_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-12 col-sm-6">
                    <label for="company_id">{{ __("general.company") }}</label>
                    <select name="company_id" id="choices-company-id" class="multisteps-form__input form-control @error('company_id') is-invalid @enderror">
                        <option value="0" disabled selected>{{ __("general.select-item", ["item" => strtolower(__("general.company"))]) }}</option>
                        @foreach( $companiesData as $company )
                            <option value="{{ $company->id }}" @if( !empty( $domainData->company_id ) && $company->id === $domainData->company_id ) selected="selected" @endif>{{ $company->name }}</option>
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

                <div class="col-12 col-sm-6">
                    <label for="host_id">{{ __("general.host") }}</label>
                    <select name="host_id" id="choices-host-id" class="multisteps-form__input form-control @error('host_id') is-invalid @enderror">
                        <option value="0" disabled selected>{{ __("general.select-item", ["item" => strtolower(__("general.host"))]) }}</option>
                        @foreach( $hostsData as $host )
                            <option value="{{ $host->id }}" @if( !empty( $domainData->host_id ) && $host->id === $domainData->host_id ) selected="selected" @endif>{{ $host->name }} - {{ $host->ip_address }}</option>
                        @endforeach
                    </select>

                    @error('host_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-4">

                <div class="col-12 col-sm-7">
                    <div class="form-group">
                        <label>
                            {{ __("general.production") }}?
                        </label>
                        <p class="form-text text-muted text-xs ms-1">
                            {!! __("pages/domain.is-production--subtext") !!}
                        </p>
                        <div class="form-check form-switch ms-1">
                            <input class="form-check-input" type="checkbox" id="isProduction" name="is_production" {{ isset( $domainData->is_production ) && 1 === $domainData->is_production ? 'checked' : '' }}>
                            <label class="form-check-label" for="isProduction"></label>
                        </div>
                    </div>

                    @error('production')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-12 col-sm-7">
                    <div class="form-group">
                        <label>
                            {{ __("general.active") }}?
                        </label>
                        <p class="form-text text-muted text-xs ms-1">
                            {!! __("pages/domain.active--subtext") !!}
                        </p>
                        <div class="form-check form-switch ms-1">
                            <input class="form-check-input" type="checkbox" id="active" name="active" {{ isset( $domainData->active ) && 1 === $domainData->active ? 'checked' : '' }}>
                            <label class="form-check-label" for="active"></label>
                        </div>
                    </div>

                    @error('active')
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
                            onclick="window.location = '{{ Route('domain-overview') }}'"
                            title="Prev">{{ __( "general.back-to", ["location" => strtolower( __("general.overview") )] ) }}</button>

                    <button class="btn bg-gradient-dark ms-2 mb-0 js-btn-next"
                            type="submit"
                            title="Next">{{ __("general.save", ["item" => strtolower(__("general.domain"))]) }}</button>
                </div>

            </div>

        </div>

    </div>

</form>
