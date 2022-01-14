
<div class="card p-3 mt-4 border-radius-xl bg-white js-active">

    <h5 class="font-weight-bolder mb-0">{!! __("pages/company.content.add.title--domain-overview") !!}</h5>
    <p class="mb-0 text-sm">{!! __("pages/company.content.add.description--domain-overview") !!}</p>

    <div class="multisteps-form__content">

        @if ( $companyDomains->count() )

            <div class="row mt-4">

                @foreach( $companyDomains as $domain )

                    <div class="col-12 col-sm-4 mb-2">
                        <a class="text-dark domainHover" href="{{ Route('domain-edit', ['id' => $domain->id]) }}">
                            <i class="fas fa-eye domainHoverIcon"></i>
                            {{ $domain->name }}
                        </a>
                    </div>

                @endforeach

                <a href="{{ Route('domain-overview', ['company_id' => $domain->company_id]) }}" class="domainLink text-sm mt-3">
                    {!! __("pages/company.domain-overview--subtext") !!}?
                    {!! __("general.click-here") !!}
                    <i class="fas fa-long-arrow-alt-right"></i>
                </a>

            </div>

        @else
            <span class="text-dark mt-4 d-block">{{ __("general.no-results-found", ["item" => strtolower( __("general.domains") )]) }}</span>
        @endif

    </div>

</div>
