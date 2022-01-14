
<div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

    <h5 class="font-weight-bolder mb-0">{!! __("pages/company.content.add.title") !!}</h5>
    <p class="mb-0 text-sm">{!! __("pages/company.content.add.description") !!}</p>

    <div class="multisteps-form__content">

        <div class="row mt-3">
            <div class="col-12 col-sm-6">
                <label for="name">{{ __("general.name") }}</label>
                <p class="form-text text-muted text-xs ms-1">
                    {!! __("pages/company.name--subtext") !!}
                </p>
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
                       value="{{ old('legal_name', (isset($companyData->legal_name) ? $companyData->legal_name : "")) }}"
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
                       value="{{ old('street_name', (isset($companyData->street_name) ? $companyData->street_name : "")) }}"
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
                       value="{{ old('house_number', (isset($companyData->house_number) ? $companyData->house_number : "")) }}"
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
                       value="{{ old('house_number_extra', (isset($companyData->house_number_extra) ? $companyData->house_number_extra : "")) }}"
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
                       value="{{ old('postal_code', (isset($companyData->postal_code) ? $companyData->postal_code : "")) }}"
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
                       value="{{ old('city', (isset($companyData->city) ? $companyData->city : "")) }}"
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
                       value="{{ old('province', (isset($companyData->province) ? $companyData->province : "")) }}"
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
                       value="{{ old('country', (isset($companyData->country) ? $companyData->country : "")) }}"
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
                       value="{{ old('telephone', (isset($companyData->telephone) ? $companyData->telephone : "")) }}"
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
                       value="{{ old('primary_email', (isset($companyData->primary_email) ? $companyData->primary_email : "")) }}"
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
                       value="{{ old('primary_website', (isset($companyData->primary_website) ? $companyData->primary_website : "")) }}"
                       placeholder="" />

                @error('primary_website')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>

        </div>

        <div class="row mt-5">

            <div class="col-12 col-sm-7">
                <div class="form-group">
                    <label>
                        {{ __("general.active") }}?
                    </label>
                    <p class="form-text text-muted text-xs ms-1">
                        {!! __("pages/company.active--subtext") !!}
                    </p>
                    <div class="form-check form-switch ms-1">
                        <input class="form-check-input" type="checkbox" id="active" name="active" {{ isset( $companyData->active ) && 1 === $companyData->active ? 'checked' : '' }}>
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

    </div>

</div>
