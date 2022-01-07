
@section('css')

    .bannerBackground {
        background-size: cover;
        background-position: center;
    }

@endsection

<div class="min-height-300 bg-primary position-absolute w-100 bannerBackground" style="background-image: url({{ url( "img/banners/banner-". $loginUserData->picture_default_id .".png" ) }})"></div>
