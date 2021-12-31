
@extends('layout.system')

@section('css')

    .background-image {
        background-image: url( {!! url('img/backgrounds/login.jpg') !!} );
        background-size: cover;
        background-position: center;
    }

@endsection

@section('pageContent')


    <main class="main-content main-content-bg mt-0">
        <div class="page-header background-image min-vh-100">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4 pb-1">
                                <h4 class="font-weight-bolder mb-1">{!! __("pages/login.title") !!}</h4>
                                <p class="mb-0">{!! __("pages/login.description") !!}</p>
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('js')

    <script src="{{ url('js/plugins/NovaPasswordViewer.js') }}"></script>

@endsection
