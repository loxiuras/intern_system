<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary border-0 mb-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <form role="form" method="POST" action="{{ route('forgot-password') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ni ni-email-83"></i>
                                    </span>
                                </div>
                                <input class="form-control"
                                       name="email"
                                       placeholder="{{ __("general.email") }}"
                                       aria-label="{{ __("general.email") }}"
                                       type="email"
                                       autocomplete="off">
                            </div>

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
                            <button type="submit" class="btn btn-primary mt-4 px-5">{{ __("general.send-password-reset") }}</button>
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
