
@extends('layout.system')

@section('pageContent')

    <main class="main-content main-content-bg mt-0">
        <div class="page-header min-vh-100" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-basic.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="card z-index-0">
                            <div class="card-body">
                                <h5 class="text-dark text-center mt-4">Forget password</h5>
                                <div class="text-center text-muted mb-4">
                                    <small>Enter your e-mailaddress to receive a password reset e-mail within 5 minutes.</small>
                                </div>

                                <form role="form">
                                    <div class="mb-0">
                                        <label for="email">{{ __("general.email") }}</label>
                                        <input type="email"
                                               class="form-control"
                                               placeholder="{{ __("general.email") }}"
                                               aria-label="{{ __("general.email") }}">
                                    </div>
                                    <div class="text-center">
                                        <button type="button"
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
