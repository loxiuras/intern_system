
@extends('layout.front')

@section('css')

    body {
        background-size: cover;
        background-attachment: fixed;
        background-position: top center;
        background-image: url( {{ url( "img/content/404-a.svg" ) }} );
    }

    p {
        font-weight: 400;
    }

    h3 {
        font-weight: 600;
    }

    .section .container {
        background-color: rgba( 255, 255, 255, 0.95 );
    }

@endsection

@section('pageContent')

    <div class="section mt-0 pt-0 mb-0 pb-0">
        <div class="container pt-7">

            <div class="row">
                <div class="col-md-12 mx-auto">
                    <h3 class="display-3">{{ $manualData->title }}</h3>
                    <p class="text-sm">
                        <strong>{{ __("general.reference") }}</strong>: {{ $manualData->reference }}
                        |
                        <strong>{{ __("general.created-by") }}</strong>: {{ $manualData->createdUserName }} {{ $manualData->createdUserInsertion }} {{ $manualData->createdUserLastName }}
                        ( {{ (new \App\Services\DateService( $manualData->created_at ))->translate() }} )
                        |
                        <strong>{{ __("general.updated-by") }}</strong>: {{ $manualData->updatedUserName }} {{ $manualData->updatedUserInsertion }} {{ $manualData->updatedUserLastName }}
                        ( {{ (new \App\Services\DateService( $manualData->updated_at ))->translate() }} )
                    </p>

                    <hr class="w-100">

                    <a href="{{ Route("manual-overview") }}" class="text-sm mb-4 d-block"><i class="fas fa-long-arrow-alt-left"></i> Terug naar overzicht</a>
                </div>
            </div>

            @if( isset( $contentsData ) && $contentsData->count() )
                @foreach( $contentsData as $content )

                    <div class="row pb-4">
                        <div class="col-md-12 mx-auto">

                            @if( $content->title )
                                @if( $content->big_title )
                                    <h3 class="text-primary text-lg mt-4">{{ $content->title }}</h3>
                                @else
                                    <h5 class="">{{ $content->title }}</h5>
                                @endif
                            @endif

                            @if( $content->description ) {!! $content->description !!} @endif

                            @if ( $contentImagesData[ $content->id ] )

                                <div class="image-wrap d-flex w-100">

                                    @foreach( $contentImagesData[ $content->id ] as $image )

                                        <img style="max-width: 50%;" src="{{ url( "uploads/". $image->type. "/". $image->file .".". $image->extension ) }}" alt="{{ $image->file }}" />

                                    @endforeach

                                </div>

                            @endif

                        </div>
                    </div>

                @endforeach
            @endif

            <a href="{{ Route("manual-overview") }}" class="text-sm mb-5 d-block"><i class="fas fa-long-arrow-alt-left"></i> Terug naar overzicht</a>

        </div>
    </div>

@endsection

@section('js')
@endsection

