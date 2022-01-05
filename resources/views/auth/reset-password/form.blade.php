<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary border-0 mb-0">
                <div class="card-body px-lg-5 py-lg-5">

                    <form role="form" method="POST" action="{{ route('reset-password', ["email" => $email, "token" => $token]) }}">
                        @csrf

                        <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ni ni-lock-circle-open"></i>
                                    </span>
                                </div>
                                <input class="form-control"
                                       name="password"
                                       placeholder="{{ __("general.password") }}"
                                       aria-label="{{ __("general.password") }}"
                                       type="password"
                                       autocomplete="off">
                            </div>

                            @error('password')
                            <p class="text-danger small text- mt-1 mb-0">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ni ni-lock-circle-open"></i>
                                    </span>
                                </div>
                                <input class="form-control"
                                       name="password_confirmation"
                                       placeholder="{{ __("general.confirm-password") }}"
                                       aria-label="{{ __("general.confirm-password") }}"
                                       type="password"
                                       autocomplete="off">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4 px-5">{{ __("general.reset-password") }}</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <small class="text-light">
                        {!! __("general.back-to-login", [ "link" => "<a class='text-bold text-light' href='". Route('login') ."'>". __("general.click-here") ."</a>" ]) !!}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
