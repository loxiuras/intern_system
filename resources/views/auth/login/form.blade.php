<div class="card-body">
    <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email">{{ __("general.email") }}</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="{{ __("general.email") }}"
                   aria-label="{{ __("general.email") }}">

            @error('email')
            <p class="text-danger small text- mt-1 mb-0">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password">{{ __("general.password") }}</label>

            <input type="password"
                   name="password"
                   class="form-control NovaPasswordViewer"
                   placeholder="password"
                   aria-label="password">

            @error('password')
            <p class="text-danger small text- mt-1 mb-0">
                {{ $message }}
            </p>
            @enderror
        </div>

        @error('credentials')
        <p class="text-danger small text- mt-0 mb-2">
            {{ $message }}
        </p>
        @enderror

        <div class="form-check form-switch">
            <input class="form-check-input"
                   type="checkbox"
                   id="rememberMe">
            <label class="form-check-label"
                   for="rememberMe">{{ __("general.remember-me") }}</label>
        </div>
        <div class="text-center">
            <button type="submit"
                    class="btn btn-primary w-100 my-4 mb-2">{{ __("general.sign-in") }}</button>
        </div>
        <div class="text-center text-sm mt-2">
            {!! __("general.forget-password", [ "link" => "<a class='text-bold text-dark' href='". Route('forgot-password') ."'>". __("general.click-here") ."</a>" ]) !!}
        </div>
    </form>
</div>
