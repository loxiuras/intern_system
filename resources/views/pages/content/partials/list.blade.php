<style>

    .contentDescription,
    .contentDescription p,
    .contentDescription a,
    .contentDescription ul,
    .contentDescription li
    {
        font-size: .85rem;
    }

</style>

<div class="card p-3 mt-4 border-radius-xl bg-white js-active" data-animation="FadeIn">

    <h5 class="font-weight-bolder mb-0">{!! __("pages/content.content.add.title--content") !!}</h5>
    <p class="mb-0 text-sm">{!! __("pages/content.content.add.description--content") !!}</p>

    <div class="multisteps-form__content mt-4">

        @if ( isset( $contentsData ) && $contentsData && $contentsData->count() )

            <div class="row mt-2 border-bottom pb-1">

                <div class="col-12 col-md-2 mb-1">
                    <span class="text-sm text-bold text-primary">{{ __("general.title") }}</span>
                </div>

                <div class="col-12 col-md-7 mb-1">
                    <span class="text-sm text-bold text-primary">{{ __("general.description") }}</span>
                </div>

                <div class="col-12 col-md-2 mb-1 text-center">
                    <span class="text-sm text-bold text-primary">{{ __("general.status") }}</span>
                </div>

                <div class="col-12 col-md-1 mb-1">
                    <span class="text-sm text-bold text-primary">{{ __("general.actions") }}</span>
                </div>

            </div>

            @foreach( $contentsData as $content )

                <div class="row mt-2">

                    <div class="col-12 col-md-2 mb-1">
                        <span class="text-dark text-sm">{!! $content->title !!}</span>
                    </div>

                    <div class="col-12 col-md-7 mb-1 contentDescription">
                        <span class="text-dark text-sm">{!! $content->description !!}</span>
                    </div>

                    <div class="col-12 col-md-2 mb-1 text-center">
                        @if( $content->active )
                            <span class="badge bg-gradient-success">{{ __("general.active") }}</span>
                        @else
                            <span class="badge bg-gradient-secondary">{{ __("general.in-active") }}</span>
                        @endif
                    </div>

                    <div class="col-12 col-md-1 mb-1">
                        <a href="{{ Route('content-edit', ['id' => $content->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                            <i class="fas fa-edit text-secondary"></i>
                        </a>

                        <form class="mx-3" action="{{ Route('content-delete', ['id' => $content->id]) }}" method="POST" title="{{ $content->id }}" style="display: inline-block;">
                            @method('delete')
                            @csrf

                            <label for="deleteSubmit{{$content->id}}">
                                <span data-bs-toggle="tooltip" data-bs-original-title="Delete content" style="cursor: pointer;">
                                    <i class="fas fa-trash text-secondary"></i>
                                </span>
                            </label>

                            <input id="deleteSubmit{{$content->id}}" name="deleteSubmit{{$content->id}}" type="submit" style="display: none" />
                        </form>
                    </div>

                </div>

            @endforeach

        @endif

    </div>

</div>
