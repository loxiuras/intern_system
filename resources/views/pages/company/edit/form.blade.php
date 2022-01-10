<div class="container-fluid py-4">
    <div class="row mb-5">
        <div class="col-12">
            <div class="multisteps-form mb-5">

                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">

                        <form method="POST" action="{{ Route("company-store") }}" class="multisteps-form__form mb-1">
                            @csrf

                            <input type="hidden" name="id" id="id" value="{{ isset($companyData->id) ? $companyData->id : 0 }}">

                            @include("pages.company.edit.general")
                            @if( isset($companyData->id) )
                                @include("pages.company.edit.users")
                            @endif
                            @include("pages.company.edit.invoice")

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
