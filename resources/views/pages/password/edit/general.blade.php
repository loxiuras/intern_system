
<form method="POST" action="{{ Route("password-store") }}" class="multisteps-form__form mb-1">
    @csrf

    <input type="hidden" name="id" id="id" value="{{ isset($passwordData->id) ? $passwordData->id : 0 }}">

    <div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

        <h5 class="font-weight-bolder mb-0">{!! __("pages/password.content.add.title") !!}</h5>
        <p class="mb-0 text-sm">{!! __("pages/password.content.add.description") !!}</p>

        <div class="multisteps-form__content">

            <div class="row mt-3">

                <div class="col-12 col-sm-4">
                    <label for="name">{{ __("general.type") }}</label>
                    <select name="type" id="choices-type-id" class="multisteps-form__input form-control @error('type') is-invalid @enderror">
                        <option value="0" disabled selected>{{ __("general.select-item", ["item" => strtolower(__("general.type"))]) }}</option>
                        @foreach( $typesData as $type )
                            <option value="{{ $type->type }}" @if( !empty( $passwordData->type ) && $type->type === $passwordData->type ) selected="selected" @endif>{{ __("general.". $type->type ) }}</option>
                        @endforeach
                    </select>

                    @error('type')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4">
                    <label for="name">{{ __("general.id") }}</label>
                    <input class="multisteps-form__input form-control @error('record_id') is-invalid @enderror"
                           type="number"
                           name="record_id"
                           id="record_id"
                           value="{{ old('record_id', (isset($passwordData->record_id) ? $passwordData->record_id : ""))  }}"
                           placeholder="" />

                    @error('record_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-12 col-sm-4">
                    <label for="name">{{ __("general.name") }}</label>
                    <input class="multisteps-form__input form-control @error('name') is-invalid @enderror"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name', (isset($passwordData->name) ? $passwordData->name : ""))  }}"
                           placeholder="" />

                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-12">
                    <label for="description">{{ __("general.description") }}</label>
                    <div id="edit-description-edit" class="h-100">
                        {{ $passwordData->description }}
                    </div>
                </div>

            </div>

            <hr class="horizontal dark mt-7">

            <div class="row mt-3">

                <div class="col-12 col-sm-4">
                    <label for="name">{{ __("general.username") }}</label>
                    <input class="multisteps-form__input form-control @error('username') is-invalid @enderror"
                           type="text"
                           name="username"
                           id="username"
                           value="{{ old('username', (isset($passwordData->username) ? $passwordData->username : ""))  }}"
                           placeholder="" />

                    @error('username')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4">
                    <label for="name">{{ __("general.password") }}</label>
                    <input class="multisteps-form__input form-control NovaPasswordViewer @error('password') is-invalid @enderror"
                           type="password"
                           name="password"
                           id="password"
                           value="{{ old('password', (isset($passwordData->password) ? $passwordData->password : ""))  }}"
                           placeholder="" />

                    @error('password')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

        </div>

    </div>

</form>
