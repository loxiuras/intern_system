<div class="container-fluid py-4">
    <div class="row mb-5">
        <div class="col-12">
            <div class="multisteps-form mb-5">

                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">

                        @include("pages.user.edit.general")
                        @if( isset($userData->id) )
                            @include("pages.user.edit.password")
                            @include("pages.password.partials.list", [ 'addType' => 'user', 'addRecordId' => $userData->id ])
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
