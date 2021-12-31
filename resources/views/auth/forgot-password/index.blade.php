
@extends('layout.system')

@section('css')

    .background-image {
        background-image: url( {!! url('img/backgrounds/forgot-password.jpg') !!} );
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
                                <h4 class="font-weight-bolder mb-1">{!! __("pages/forgot-password.title") !!}</h4>
                                <p class="mb-0">{!! __("pages/forgot-password.description") !!}</p>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('forgot-password') }}">
                                    @csrf

                                    <div class="mb-0">
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

                                    @if(session('status'))
                                        <p class="{{ session('statusClass') }} small text- mt-2 mb-1">
                                            {!! session('status') !!}
                                        </p>
                                    @endif

                                    <div class="text-center">
                                        <button type="submit"
                                                class="btn bg-gradient-dark w-100 my-4 mb-2">{{ __("general.send-password-reset") }}</button>
                                    </div>
                                    <div class="text-center text-sm mt-2">
                                        {!! __("general.back-to-login", [ "link" => "<a class='text-bold text-dark' href='". Route('login') ."'>". __("general.click-here") ."</a>" ]) !!}
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
