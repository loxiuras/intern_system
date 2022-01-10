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
                       value="{{ old('primary_invoice_email', (isset($companyData->primary_invoice_email) ? $companyData->primary_invoice_email : "")) }}"
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
                    {{ old('optional_invoice_emails', (isset($companyData->optional_invoice_emails) ? $companyData->optional_invoice_emails : "")) }}
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
