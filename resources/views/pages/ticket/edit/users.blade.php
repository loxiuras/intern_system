
<div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

    <h5 class="font-weight-bolder mb-0">{!! __("pages/ticket.content.add.title--users") !!}</h5>
    <p class="mb-0 text-sm">{!! __("pages/ticket.content.add.description--users") !!}</p>

    <div class="multisteps-form__content">

        <div class="row mt-3">
            <div class="col-12 col-sm-12">

                <div class="card" style="background-color: transparent; box-shadow: none;">
                    <div class="card-body d-flex">

                        <div class="col-lg-2 col-md-2 col-sm-3 col-4 text-center">
                            <div class="avatar avatar-lg border-1 rounded-circle bg-gradient-primary NovaModel" data-nova-model-body-class="modal-open" data-nova-model-target="connectUserModel">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                            <p class="mb-0 text-sm" style="margin-top:6px;">{{ __("general.connect-item", ["item" => strtolower(__("general.user"))]) }}</p>
                        </div>

                        @foreach( $ticketUsers as $user )

                            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
                                <div class="avatar avatar-lg rounded-circle border border-primary">
                                    <!-- ToDo: Add user image; -->
                                    <img alt="Image placeholder" class="p-1" src="https://picsum.photos/400/400?random={{ $user->user_id }}">
                                </div>
                                <p class="mb-0 text-sm">
                                    <span class="text-dark text-bold">{!! $user->name !!}</span><br><small>{!! $user->insertion !!} {!! $user->last_name !!}</small>
                                </p>
                            </div>

                        @endforeach

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
