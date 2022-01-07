
<form method="POST" action="{{ Route("user-store-password") }}" class="multisteps-form__form">
    @csrf

    <input type="hidden" name="id" id="id" value="{{ isset($userData->id) ? $userData->id : 0 }}">

    <div class="card p-3 mt-4 border-radius-xl bg-white">

        <h5 class="font-weight-bolder mb-0">{!! __("pages/user.content.add.title--password") !!}</h5>
        <p class="mb-0 text-sm">{!! __("pages/user.content.add.description--password") !!}</p>

        @if( session('passwordSaved') )
            <p class="mb-0 mt-2 text-sm text-bold text-success">
                {!! session('passwordSavedText') !!}
            </p>
        @endif

        <div class="multisteps-form__content">

            <div class="row mt-3">
                <div class="col-12 col-sm-6">
                    <label for="password">{{ __("general.current-password") }}</label>
                    <input class="multisteps-form__input form-control NovaPasswordViewer @error('current_password') is-invalid @enderror @if( session('incorrectCurrentPassword') ) is-invalid @endif"
                           type="password"
                           name="current_password"
                           id="current_password"
                           value="" />
                    @error('current_password')
                        <span class="text-danger text-sm">
                                {{ $message }}
                            </span>
                        @enderror
                    @if( session('incorrectCurrentPassword') )
                        <span class="text-danger text-sm">
                            {{ __("auth.password") }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-sm-6">
                    <label for="new_password">{{ __("general.password") }}</label>
                    <input class="multisteps-form__input form-control NovaPasswordViewer @error('new_password') is-invalid @enderror"
                           type="password"
                           name="new_password"
                           id="new_password"
                           value="" />

                    @error('new_password')
                        <span class="text-danger text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-sm-6">
                    <label for="new_password_confirmation">{{ __("general.confirm-password") }}</label>
                    <input class="multisteps-form__input form-control NovaPasswordViewer @error('new_password_confirmation') is-invalid @enderror"
                           type="password"
                           name="new_password_confirmation"
                           id="new_password_confirmation"
                           value="" />

                    @error('new_password_confirmation')
                        <span class="text-danger text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="button-row d-flex mt-4">
                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                        type="submit"
                        title="Next">{{ __("general.save", ["item" => strtolower(__("general.password"))]) }}</button>
            </div>

        </div>

    </div>
</form>
