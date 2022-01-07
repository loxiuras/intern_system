
<form method="POST" action="{{ Route("user-store") }}" class="multisteps-form__form mb-1">
    @csrf

    <input type="hidden" name="id" id="id" value="{{ isset($userData->id) ? $userData->id : 0 }}">

    <div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

        <h5 class="font-weight-bolder mb-0">{!! __("pages/user.content.add.title") !!}</h5>
        <p class="mb-0 text-sm">{!! __("pages/user.content.add.description") !!}</p>

        <div class="multisteps-form__content">

            <div class="row mt-3">
                <div class="col-12 col-sm-4">
                    <label for="first_name">{{ __("general.first-name") }}</label>
                    <input class="multisteps-form__input form-control"
                           type="text"
                           name="first_name"
                           id="first_name"
                           value="{{ old('first_name', (isset($userData->first_name) ? $userData->first_name : ""))  }}"
                           placeholder="" />
                </div>
                <div class="col-12 col-sm-3">
                    <label for="insertion">{{ __("general.insertion") }}</label>
                    <input class="multisteps-form__input form-control"
                           type="text"
                           name="insertion"
                           id="insertion"
                           value="{{ old('insertion', (isset($userData->insertion) ? $userData->insertion : ""))  }}"
                           placeholder="" />
                </div>
                <div class="col-12 col-sm-5 mt-3 mt-sm-0">
                    <label for="last_name">{{ __("general.last-name") }}</label>
                    <input class="multisteps-form__input form-control"
                           type="text"
                           name="last_name"
                           id="last_name"
                           value="{{ old('insertion', (isset($userData->last_name) ? $userData->last_name : ""))  }}"
                           placeholder="" />
                </div>
            </div>

            <div class="row mt-3">

                <!-- ToDo: Add VueJS calendar; -->
                <div class="col-12 col-sm-5">
                    <label for="date_of_birth">{{ __("general.date-of-birth") }}</label>
                    <input class="multisteps-form__input form-control"
                           type="date"
                           name="date_of_birth"
                           id="date_of_birth"
                           value="{{ old('date_of_birth', (isset($userData->date_of_birth) ? $userData->date_of_birth : ""))  }}"
                           placeholder="" />
                </div>
            </div>

            <hr class="horizontal dark mt-4">

            <div class="row mt-3">
                <div class="col-12 col-sm-6">
                    <label for="email">{{ __("general.email") }}</label>
                    <input class="multisteps-form__input form-control"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ old('email', (isset($userData->email) ? $userData->email : ""))  }}"
                           placeholder="" />
                </div>
                <div class="col-12 col-sm-6">
                    <label for="telephone">{{ __("general.telephone") }}</label>
                    <input class="multisteps-form__input form-control"
                           type="text"
                           name="telephone"
                           id="telephone"
                           value="{{ old('telephone', (isset($userData->telephone) ? $userData->telephone : ""))  }}"
                           placeholder="" />
                </div>
            </div>

            <div class="button-row d-flex mt-4">
                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                        type="button"
                        title="Next">{{ __("general.save", ["item" => strtolower(__("general.user"))]) }}</button>
            </div>

        </div>

    </div>
</form>
