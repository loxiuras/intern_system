
<form method="POST" action="{{ Route("user-store") }}" class="multisteps-form__form">
    @csrf

    <div class="card p-3 mt-4 border-radius-xl bg-white">

        <h5 class="font-weight-bolder mb-0">{!! __("pages/user.content.add.title--password") !!}</h5>
        <p class="mb-0 text-sm">{!! __("pages/user.content.add.description--password") !!}</p>

        <div class="multisteps-form__content">

            <div class="row mt-3">
                <div class="col-12 col-sm-6">
                    <label for="password">{{ __("general.current-password") }}</label>
                    <input class="multisteps-form__input form-control NovaPasswordViewer"
                           type="password"
                           name="current_password"
                           id="current_password"
                           value="" />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-sm-6">
                    <label for="password">{{ __("general.password") }}</label>
                    <input class="multisteps-form__input form-control NovaPasswordViewer"
                           type="password"
                           name="password"
                           id="password"
                           value="" />
                </div>
                <div class="col-12 col-sm-6">
                    <label for="password_confirmation">{{ __("general.confirm-password") }}</label>
                    <input class="multisteps-form__input form-control NovaPasswordViewer"
                           type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           value="" />
                </div>
            </div>

            <div class="button-row d-flex mt-4">
                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                        type="button"
                        title="Next">{{ __("general.save", ["item" => strtolower(__("general.password"))]) }}</button>
            </div>

        </div>

    </div>
</form>
