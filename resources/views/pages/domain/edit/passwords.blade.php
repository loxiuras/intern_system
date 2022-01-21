
<div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

    <h5 class="font-weight-bolder mb-0">{!! __("pages/domain.content.add.title--password") !!}</h5>
    <p class="mb-0 text-sm">{!! __("pages/domain.content.add.description--password") !!}</p>

    <div class="multisteps-form__content mt-4">

        @if ( $domainPasswords && $domainPasswords->count() )

            @foreach( $domainPasswords as $password )

                <div class="row mt-2">

                    <div class="col-12 col-md-5 mb-1">
                        <a href="{{ Route("password-edit", ["id" => $password->id]) }}" class="text-dark text-sm text-bold">{!! $password->name !!}</a>
                    </div>

                    <div class="col-12 col-md-7 mb-1">
                        <span class="NovaTextSwitcher"
                              data-icon="fas fa-eye"
                              data-close-icon="fas fa-eye-slash"
                              data-text="{!! $password->password !!}">
                            @for( $i = 0; $i <= strlen( $password->password ); $i++ )*@endfor
                        </span>
                    </div>

                </div>

            @endforeach

        @endif

    </div>
</div>
