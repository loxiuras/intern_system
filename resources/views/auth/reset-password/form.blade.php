<div class="card-body">
    <form role="form" method="POST" action="{{ route('reset-password', ["email" => $email, "token" => $token]) }}">
        @csrf

        <div class="mb-0">
            <label for="password">{{ __("general.password") }}</label>
            <input type="password"
                   name="password"
                   class="form-control NovaPasswordViewer @error('password') border-danger @enderror"
                   placeholder="{{ __("general.password") }}"
                   aria-label="{{ __("general.password") }}">

            @error('password')
            <p class="text-danger small text- mt-1 mb-0">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-0 mt-3">
            <label for="password_confirmation">{{ __("general.confirm-password") }}</label>
            <input type="password"
                   name="password_confirmation"
                   class="form-control NovaPasswordViewer"
                   placeholder="{{ __("general.confirm-password") }}"
                   aria-label="{{ __("general.confirm-password") }}">
        </div>

        <div class="text-center">
            <button type="submit"
                    class="btn bg-gradient-dark w-100 my-4 mb-2">{{ __("general.reset-password") }}</button>
        </div>
        <div class="text-center text-sm mt-2">
            {!! __("general.back-to-login", [ "link" => "<a class='text-bold text-dark' href='". Route('login') ."'>". __("general.click-here") ."</a>" ]) !!}
        </div>
    </form>
</div>
