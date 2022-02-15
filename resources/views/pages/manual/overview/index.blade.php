
@extends('layout.system')

@section('styles')
@endsection

@section('pageContent')

    @include('layout.banner')

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        <div class="container-fluid py-4">

            <div class="d-sm-flex justify-content-end">
                <div>
                    <a href="{{ Route('manual-add') }}" class="btn btn-icon btn-outline-white">
                        + {{ __("general.add-new-item", ["item" => strtolower(__("general.manual"))]) }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <form action="{{ Route('manual-overview') }}" method="POST">
                                @csrf

                                <div class="row mt-3">

                                    <div class="col-12 col-sm-2">
                                        <label for="title">{{ __("general.title") }}</label>
                                        <input class="multisteps-form__input form-control @error('title') is-invalid @enderror"
                                               type="text"
                                               name="title"
                                               id="title"
                                               value="{{ old('title', (!empty( $searchData->title ) ? $searchData->title : "")) }}"
                                               placeholder="" />
                                    </div>

                                    <div class="col-12 col-sm-3 d-flex align-items-end">
                                        <button type="submit" class="btn btn-sm btn-dark btn-lg mt-4 mb-0 px-6">{{ __("general.filter") }}</button>

                                        @if( isset( $searchData ) && count( (array)$searchData ) > 0 )
                                            <a href="{{ Route('manual-overview') }}" class="btn btn-sm btn-light btn-lg mt-4 mb-0 mx-2 px-6">{{ __("general.clear") }}</a>
                                        @endif
                                    </div>

                                </div>
                            </form>

                        </div>

                        <div class="table-responsive">

                            <table class="table table-flush" id="datatable-manual-list">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{ __("general.reference") }}</th>
                                    <th>{{ __("general.title") }}</th>
                                    <th data-sortable="false">{{ __("general.actions") }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach( $manualsData as $manual )
                                    <tr>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $manual->reference }}</span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $manual->title }}</span>
                                        </td>

                                        <td class="text-sm">
                                            <a href="{{ Route('manual-edit', ['id' => $manual->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                <i class="fas fa-edit text-secondary"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>

    <script src="{{ url('js/plugins/datatables.js') }}"></script>
    <script>
        if (document.getElementById('datatable-manual-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-manual-list", {
                searchable: false,
                perPageSelect: false,
                perPage: 20,
            });
        }
    </script>

@endsection

