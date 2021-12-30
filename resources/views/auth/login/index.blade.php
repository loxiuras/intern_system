
@extends('layout.system')

@section('pageContent')

    <main class="main-content main-content-bg mt-0">
        <div class="page-header min-vh-100" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-basic.jpg');">
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
                                <form role="form" class="text-start">
                                    <div class="mb-3">
                                        <label for="email">{{ __("general.email") }}</label>
                                        <input type="email"
                                               class="form-control"
                                               placeholder="{{ __("general.email") }}"
                                               aria-label="{{ __("general.email") }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">{{ __("general.password") }}</label>
                                        <input type="password"
                                               class="form-control"
                                               placeholder="password"
                                               aria-label="password">
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="rememberMe">
                                        <label class="form-check-label"
                                               for="rememberMe">{{ __("general.remember-me") }}</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="button"
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
