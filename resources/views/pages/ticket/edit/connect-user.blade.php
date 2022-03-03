

<div class="modal fade" id="connectUserModel" tabindex="-1" role="dialog" aria-labelledby="connectUserModel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">


                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-primary text-gradient">{!! __("pages/ticket.connect-user.title") !!}</h3>
                        <p class="mb-0">{!! __("pages/ticket.connect-user.description") !!}</p>
                    </div>

                    <div class="card-body pb-3">
                        <form role="form text-left" method="POST" action="{{ Route('ticket-connect-user') }}">
                            @csrf

                            <input type="hidden" name="id" id="name" value="{{ $ticketData->id }}" />

                            <div class="row">
                                <div class="col-12">
                                    <label for="user_id">{{ __("general.user") }}</label>
                                    <div class="input-group mb-3" style="width: 100%;">
                                        <select name="user_id" class="form-control" id="choices-user-id">
                                            <option value="0" disabled selected>{{ __("general.select-item", ["item" => strtolower(__("general.name"))]) }}</option>
                                            @foreach( $connectUsers as $user )
                                                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->insertion }} {{ $user->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg w-100 mt-2 mb-0">{{ __("general.connect-item", ["item" => strtolower( __("general.user") )]) }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade" id="connectUserModelBackDrop" style="display: none;"></div>
