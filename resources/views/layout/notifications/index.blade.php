
@if ( session( 'notificationActive' ) )

    <div class="toast fade p-2 bg-white show" id="notificationBox" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; bottom: 25px; right: 25px;">
        <div class="toast-header border-0">
            <i class="{!! session( 'notificationIconClass' ) !!} text-{!! session( 'notificationType' ) !!}"></i>
            <span class="me-auto font-weight-bold ms-2">{{ session( 'notificationTitle' ) }}</span>
            @if ( session( 'notificationSubTitle' ) )
                <small class="text-body">{!! session( 'notificationSubTitle' ) !!}</small>
            @endif
            <i class="fas fa-times text-md ms-3 cursor-pointer" id="notificationClose" data-bs-dismiss="toast" aria-label="Close" aria-hidden="true"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            {!! session( 'notificationText' ) !!}
        </div>
    </div>

    <script>

        let notificationCloseElement = document.getElementById( "notificationClose" );
        if ( notificationCloseElement ) {
            let box = document.getElementById( "notificationBox" );

            notificationCloseElement.addEventListener( "click", ( ) => {
                if ( box ) {
                    box.style.opacity = 0;

                    setTimeout(() => {
                        box.classList.remove('show');
                    }, 500);
                }
            });
        }

    </script>

@endif
