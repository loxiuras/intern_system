
<form method="POST" action="{{ Route("user-store") }}" class="multisteps-form__form mb-1">
    @csrf

    <input type="hidden" name="id" id="id" value="{{ isset($userData->id) ? $userData->id : 0 }}">

    <div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

        <h5 class="font-weight-bolder mb-0">{!! __("pages/user.content.add.title") !!}</h5>
        <p class="mb-0 text-sm">{!! __("pages/user.content.add.description") !!}</p>

        <div class="multisteps-form__content">

            <div class="row mt-3">
                <div class="col-12 col-sm-4">
                    <label for="name">{{ __("general.first-name") }}</label>
                    <input class="multisteps-form__input form-control @error('name') is-invalid @enderror"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name', (isset($userData->name) ? $userData->name : ""))  }}"
                           placeholder="" />

                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-sm-3">
                    <label for="insertion">{{ __("general.insertion") }}</label>
                    <input class="multisteps-form__input form-control @error('insertion') is-invalid @enderror"
                           type="text"
                           name="insertion"
                           id="insertion"
                           value="{{ old('insertion', (isset($userData->insertion) ? $userData->insertion : ""))  }}"
                           placeholder="" />

                    @error('insertion')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-sm-5 mt-3 mt-sm-0">
                    <label for="last_name">{{ __("general.last-name") }}</label>
                    <input class="multisteps-form__input form-control @error('last_name') is-invalid @enderror"
                           type="text"
                           name="last_name"
                           id="last_name"
                           value="{{ old('insertion', (isset($userData->last_name) ? $userData->last_name : ""))  }}"
                           placeholder="" />

                    @error('last_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">

                <!-- ToDo: Add VueJS calendar; -->
                <div class="col-12 col-sm-5">
                    <label for="date_of_birth">{{ __("general.date-of-birth") }}</label>
                    <input class="multisteps-form__input form-control @error('date_of_birth') is-invalid @enderror"
                           type="date"
                           name="date_of_birth"
                           id="date_of_birth"
                           value="{{ old('date_of_birth', (isset($userData->date_of_birth) ? \Carbon\Carbon::parse($userData->date_of_birth)->format('Y-m-d') : "")) }}"
                           placeholder="" />

                    @error('date_of_birth')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-sm-6">
                    <label for="email">{{ __("general.email") }}</label>
                    <input class="multisteps-form__input form-control @error('email') is-invalid @enderror"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ old('email', (isset($userData->email) ? $userData->email : ""))  }}"
                           placeholder="" />

                    @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-sm-6">
                    <label for="telephone">{{ __("general.telephone") }}</label>
                    <input class="multisteps-form__input form-control @error('telephone') is-invalid @enderror"
                           type="text"
                           name="telephone"
                           id="telephone"
                           value="{{ old('telephone', (isset($userData->telephone) ? $userData->telephone : ""))  }}"
                           placeholder="" />

                    @error('telephone')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-4">

                <div class="col-12 col-sm-7">
                    <div class="form-group">
                        <label>
                            {{ __("general.show-in-planning-rows") }}?
                        </label>
                        <p class="form-text text-muted text-xs ms-1">
                            {!! __("pages/user.show-in-planning-rows--subtext") !!}
                        </p>
                        <div class="form-check form-switch ms-1">
                            <input class="form-check-input" type="checkbox" id="show_in_planning_rows" name="show_in_planning_rows" {{ isset( $userData->show_in_planning_rows ) && 1 === $userData->show_in_planning_rows ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_in_planning_rows"></label>
                        </div>
                    </div>

                    @error('show_in_planning_rows')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-4">

                <div class="col-12 col-sm-7">
                    <div class="form-group">
                        <label>
                            {{ __("general.active") }}?
                        </label>
                        <p class="form-text text-muted text-xs ms-1">
                            {!! __("pages/user.active--subtext") !!}
                        </p>
                        <div class="form-check form-switch ms-1">
                            <input class="form-check-input" type="checkbox" id="active" name="active" {{ isset( $userData->active ) && 1 === $userData->active ? 'checked' : '' }}>
                            <label class="form-check-label" for="active"></label>
                        </div>
                    </div>

                    @error('active')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

            </div>

            <hr class="horizontal dark mt-4">

            <div class="row mt-4">

                <label for="email">{{ __("general.banner-image") }}</label>

                <div class="col-3 d-flex justify-content-center mb-2">

                    <input type="radio" class="pictureDefaultElement"
                           name="picture_default_id"
                           value="0"
                           checked
                           id="picture_default_id_0" />
                    <label for="picture_default_id_0">
                        <img src="{{ url( "img/banners/banner-0.png" ) }}"
                             alt="profile picture"
                             class="w-100 border-radius-lg shadow-sm">
                        <span class="text bg-gradient-dark">{{ __("general.selected") }}</span>
                    </label>

                </div>

                @for( $i = 1; $i <= 3; $i++ )

                    <div class="col-3 d-flex justify-content-center mb-2">

                        <input type="radio" class="pictureDefaultElement"
                               name="picture_default_id"
                               value="{{ $i }}"
                               @if( !empty( $userData->picture_default_id ) && $userData->picture_default_id === $i ) checked @endif
                               id="picture_default_id_{{ $i }}" />
                        <label for="picture_default_id_{{ $i }}">
                            <img src="{{ url( "img/banners/banner-{$i}.png" ) }}"
                                 alt="profile picture"
                                 class="w-100 border-radius-lg shadow-sm">
                            <span class="text bg-gradient-dark">{{ __("general.selected") }}</span>
                        </label>

                    </div>

                @endfor

            </div>

            <div class="button-row d-flex mt-4">
                <button class="btn bg-gradient-light ms-auto mb-0 js-btn-next"
                        type="button"
                        onclick="window.location = '{{ Route('user-overview') }}'"
                        title="Prev">{{ __( "general.back-to", ["location" => strtolower( __("general.overview") )] ) }}</button>

                <button class="btn bg-gradient-dark ms-2 mb-0 js-btn-next"
                        type="submit"
                        title="Next">{{ __("general.save", ["item" => strtolower(__("general.user"))]) }}</button>
            </div>

        </div>

    </div>
</form>
