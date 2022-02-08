
<div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

    <h5 class="font-weight-bolder mb-0">{!! __("pages/password.content.add.title--password") !!}</h5>
    <p class="mb-0 text-sm">{!! __("pages/password.content.add.description--password") !!}</p>

    <div class="multisteps-form__content mt-4">

        @if ( $passwordsData && $passwordsData->count() )

            <div class="row mt-2 border-bottom pb-1">

                <div class="col-12 col-md-3 mb-1"><span class="text-sm text-bold text-primary">{{ __("general.name") }}</span></div>
                <div class="col-12 col-md-3 mb-1"><span class="text-sm text-bold text-primary">{{ __("general.username") }}</span></div>
                <div class="col-12 col-md-3 mb-1"><span class="text-sm text-bold text-primary">{{ __("general.password") }}</span></div>

            </div>

            @foreach( $passwordsData as $password )

                <div class="row mt-2">

                    <div class="col-12 col-md-3 mb-1">
                        <a href="{{ Route("password-edit", ["id" => $password->id]) }}" class="text-dark text-sm text-bold">{!! $password->name !!}</a>
                    </div>

                    <div class="col-12 col-md-3 mb-1">
                        <span class="text-dark text-sm">{!! $password->username !!}</span>
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <span class="NovaTextSwitcher"
                              data-icon="fas fa-eye"
                              data-close-icon="fas fa-eye-slash"
                              data-text="{!! $password->password !!}">
                            @for( $i = 0; $i <= strlen( $password->password ); $i++ )*@endfor
                        </span>
                    </div>

                </div>

            @endforeach

        @else

            <span class="text-dark mt-1 d-block">{{ __("general.no-results-found", ["item" => strtolower( __("general.passwords") )]) }}</span>

        @endif

        <a href="{{ Route( "password-add", ["type" => $addType, "recordId" => $addRecordId] ) }}" class="lightLink text-sm mt-3 d-block">
            {!! __("pages/password.password-overview--subtext") !!}?
            {!! __("general.click-here") !!}
            <i class="fas fa-long-arrow-alt-right"></i>
        </a>

    </div>
</div>
