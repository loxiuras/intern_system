<div class="container-fluid py-4">
    <div class="row mb-5">
        <div class="col-12">
            <div class="multisteps-form mb-5">

                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">

                        @include("pages.ticket.edit.general")

                        @if( isset($ticketData->id) )
                            @include("pages.ticket.edit.users")
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
