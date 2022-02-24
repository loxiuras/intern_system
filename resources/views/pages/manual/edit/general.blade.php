
<form method="POST" action="{{ Route("manual-store") }}" class="multisteps-form__form mb-1">
    @csrf

    <input type="hidden" name="id" id="id" value="{{ isset($manualData->id) ? $manualData->id : 0 }}">

    <div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

        <h5 class="font-weight-bolder mb-0">{!! __("pages/manual.content.add.title") !!}</h5>
        <p class="mb-0 text-sm">{!! __("pages/manual.content.add.description") !!}</p>

        <div class="multisteps-form__content">

            <div class="row mt-3">

                <div class="col-12 col-sm-6">
                    <label for="reference">{{ __("general.reference") }}</label>
                    <input class="multisteps-form__input form-control @error('reference') is-invalid @enderror"
                           type="text"
                           name="reference"
                           id="reference"
                           value="{{ old('reference', (isset($manualData->reference) ? $manualData->reference : ""))  }}"
                           placeholder="" />

                    @error('reference')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6">
                    <label for="title">{{ __("general.title") }}</label>
                    <input class="multisteps-form__input form-control @error('title') is-invalid @enderror"
                           type="text"
                           name="title"
                           id="title"
                           value="{{ old('title', (isset($manualData->title) ? $manualData->title : ""))  }}"
                           placeholder="" />

                    @error('title')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

        </div>

        <div class="row mt-3">

            <div class="button-row d-flex mt-4">
                <button class="btn bg-gradient-light ms-auto mb-0 js-btn-next"
                        type="button"
                        onclick="window.location = '{{ Route('manual-overview') }}'"
                        title="Prev">{{ __( "general.back-to", ["location" => strtolower( __("general.overview") )] ) }}</button>

                <button class="btn bg-gradient-dark ms-2 mb-0 js-btn-next"
                        type="submit"
                        title="Next">{{ __("general.save", ["item" => strtolower(__("general.manual"))]) }}</button>
            </div>

        </div>

    </div>

</form>
