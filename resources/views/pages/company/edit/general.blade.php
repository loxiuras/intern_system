

<form method="POST" action="{{ Route("company-store") }}" class="multisteps-form__form mb-1">
    @csrf

    <input type="hidden" name="id" id="id" value="{{ isset($companyData->id) ? $companyData->id : 0 }}">

    <div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

        <h5 class="font-weight-bolder mb-0">{!! __("pages/company.content.add.title") !!}</h5>
        <p class="mb-0 text-sm">{!! __("pages/company.content.add.description") !!}</p>

        <div class="multisteps-form__content">

            <div class="row mt-3">
                <div class="col-12 col-sm-6">
                    <label for="name">{{ __("general.name") }}</label>
                    <input class="multisteps-form__input form-control @error('name') is-invalid @enderror"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name', (isset($companyData->name) ? $companyData->name : "")) }}"
                           placeholder="" />

                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-sm-6">
                    <label for="legal_name">{{ __("general.legal-name") }}</label>
                    <p class="form-text text-muted text-xs ms-1">
                        {!! __("pages/company.legal-name--subtext") !!}
                    </p>
                    <input class="multisteps-form__input form-control @error('name') is-invalid @enderror"
                           type="text"
                           name="legal_name"
                           id="legal_name"
                           value="{{ old('name', (isset($companyData->legal_name) ? $companyData->legal_name : "")) }}"
                           placeholder="" />

                    @error('legal_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-5">

                <div class="col-12 col-sm-7">
                    <label for="street_name">{{ __("general.street-name") }}</label>
                    <input class="multisteps-form__input form-control @error('street_name') is-invalid @enderror"
                           type="text"
                           name="street_name"
                           id="street_name"
                           value="{{ old('name', (isset($companyData->street_name) ? $companyData->street_name : "")) }}"
                           placeholder="" />

                    @error('street_name')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-3">
                    <label for="house_number">{{ __("general.house-number") }}</label>
                    <input class="multisteps-form__input form-control @error('house_number') is-invalid @enderror"
                           type="number"
                           name="house_number"
                           id="house_number"
                           value="{{ old('name', (isset($companyData->house_number) ? $companyData->house_number : "")) }}"
                           placeholder="" />

                    @error('house_number')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-2">
                    <label for="house_number_extra">{{ __("general.house-number-extra") }}</label>
                    <input class="multisteps-form__input form-control @error('name') is-invalid @enderror"
                           type="text"
                           name="house_number_extra"
                           id="house_number_extra"
                           value="{{ old('name', (isset($companyData->house_number_extra) ? $companyData->house_number_extra : "")) }}"
                           placeholder="" />

                    @error('house_number_extra')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-12 col-sm-6">
                    <label for="postal_code">{{ __("general.postal-code") }}</label>
                    <input class="multisteps-form__input form-control @error('postal_code') is-invalid @enderror"
                           type="text"
                           name="postal_code"
                           id="postal_code"
                           value="{{ old('name', (isset($companyData->postal_code) ? $companyData->postal_code : "")) }}"
                           placeholder="" />

                    @error('postal_code')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6">
                    <label for="city">{{ __("general.city") }}</label>
                    <input class="multisteps-form__input form-control @error('city') is-invalid @enderror"
                           type="text"
                           name="city"
                           id="city"
                           value="{{ old('name', (isset($companyData->city) ? $companyData->city : "")) }}"
                           placeholder="" />

                    @error('city')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-12 col-sm-5">
                    <label for="province">{{ __("general.province") }}</label>
                    <input class="multisteps-form__input form-control @error('province') is-invalid @enderror"
                           type="text"
                           name="province"
                           id="province"
                           value="{{ old('name', (isset($companyData->province) ? $companyData->province : "")) }}"
                           placeholder="" />

                    @error('province')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-7">
                    <label for="country">{{ __("general.country") }}</label>
                    <input class="multisteps-form__input form-control @error('country') is-invalid @enderror"
                           type="text"
                           name="country"
                           id="country"
                           value="{{ old('name', (isset($companyData->country) ? $companyData->country : "")) }}"
                           placeholder="" />

                    @error('country')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-5">

                <div class="col-12 col-sm-4">
                    <label for="telephone">{{ __("general.telephone") }}</label>
                    <input class="multisteps-form__input form-control @error('telephone') is-invalid @enderror"
                           type="text"
                           name="telephone"
                           id="telephone"
                           value="{{ old('name', (isset($companyData->telephone) ? $companyData->telephone : "")) }}"
                           placeholder="" />

                    @error('telephone')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4">
                    <label for="primary_email">{{ __("general.email") }}</label>
                    <input class="multisteps-form__input form-control @error('primary_email') is-invalid @enderror"
                           type="text"
                           name="primary_email"
                           id="primary_email"
                           value="{{ old('name', (isset($companyData->primary_email) ? $companyData->primary_email : "")) }}"
                           placeholder="" />

                    @error('primary_email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4">
                    <label for="primary_website">{{ __("general.website") }}</label>
                    <input class="multisteps-form__input form-control @error('primary_website') is-invalid @enderror"
                           type="text"
                           name="primary_website"
                           id="primary_website"
                           value="{{ old('name', (isset($companyData->primary_website) ? $companyData->primary_website : "")) }}"
                           placeholder="" />

                    @error('primary_website')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

        </div>

    </div>

    <div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

        <h5 class="font-weight-bolder mb-0">{!! __("pages/company.content.add.title--invoice") !!}</h5>
        <p class="mb-0 text-sm">{!! __("pages/company.content.add.description--invoice") !!}</p>

        <div class="multisteps-form__content">

            <div class="row mt-3">

                <div class="col-12 col-sm-6">
                    <label for="primary_invoice_email">{{ __("general.invoice-email") }}</label>
                    <input class="multisteps-form__input form-control @error('primary_invoice_email') is-invalid @enderror"
                           type="text"
                           name="primary_invoice_email"
                           id="primary_invoice_email"
                           value="{{ old('name', (isset($companyData->primary_invoice_email) ? $companyData->primary_invoice_email : "")) }}"
                           placeholder="" />

                    @error('primary_invoice_email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6">
                    <label for="optional_invoice_emails">{{ __("general.invoice-email-optional") }}</label>
                    <textarea class="multisteps-form__input form-control @error('optional_invoice_emails') is-invalid @enderror"
                           type="text"
                           name="optional_invoice_emails"
                           id="optional_invoice_emails"
                           rows="5"
                           style="resize: none;">
                        {{ old('name', (isset($companyData->optional_invoice_emails) ? $companyData->optional_invoice_emails : "")) }}
                    </textarea>

                    @error('optional_invoice_emails')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="button-row d-flex mt-4">
                <button class="btn bg-gradient-light ms-auto mb-0 js-btn-next"
                        type="button"
                        onclick="window.location = '{{ Route('user-overview') }}'"
                        title="Prev">{{ __( "general.back-to", ["location" => strtolower( __("general.overview") )] ) }}</button>

                <button class="btn bg-gradient-dark ms-2 mb-0 js-btn-next"
                        type="submit"
                        title="Next">{{ __("general.save", ["item" => strtolower(__("general.company"))]) }}</button>
            </div>

        </div>

    </div>

</form>
