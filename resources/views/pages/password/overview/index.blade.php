
@extends('layout.system')

@section('pageContent')

    @include('layout.banner')

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

    @include("layout.nav.index")

        <div class="container-fluid py-4">

            <div class="d-sm-flex justify-content-end">
                <div>
                    <a href="{{ Route('user-add') }}" class="btn btn-icon btn-outline-white">
                        + {{ __("general.add-new-item", ["item" => strtolower(__("general.password"))]) }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <form action="{{ Route('password-overview') }}" method="POST">
                                @csrf

                                <div class="row mt-3">

                                    <div class="col-12 col-sm-2">
                                        <label for="domain_name">{{ __("general.type") }}</label>
                                        <select name="type" id="choices-type" class="multisteps-form__input form-control @error('type') is-invalid @enderror">
                                            <option value="">{{ __("general.no-choice") }}</option>
                                            @foreach( $typesData as $type )
                                                <option value='{{ $type->type }}' @if( isset( $searchData->type ) && $type->type === $searchData->type ) selected="selected" @endif>{{ __("general.". strtolower( $type->type ) ) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <label for="domain_name">{{ __("general.id") }} @if( !isset( $searchData->type ) ) - <span class="text-normal">{{ strtolower( __("general.not-available") ) }}</span> @endif</label>
                                        <input class="multisteps-form__input form-control @error('record_id') is-invalid @enderror"
                                               @if( !isset( $searchData->type ) ) disabled @endif
                                               type="number"
                                               name="record_id"
                                               id="record_id"
                                               value="{{ old('record_id', (!empty( $searchData->record_id ) ? $searchData->record_id : "")) }}"
                                               placeholder="" />
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <label for="name">{{ __("general.name") }} @if( !isset( $searchData->type ) ) - <span class="text-normal">{{ strtolower( __("general.not-available") ) }}</span> @endif</label>
                                        <input class="multisteps-form__input form-control @error('name') is-invalid @enderror"
                                               @if( !isset( $searchData->type ) ) disabled @endif
                                               type="text"
                                               name="name"
                                               id="name"
                                               value="{{ old('name', (!empty( $searchData->name ) ? $searchData->name : "")) }}"
                                               placeholder="" />
                                    </div>

                                    <div class="col-12 col-sm-3 d-flex align-items-end">
                                        <button type="submit" class="btn btn-sm btn-dark btn-lg mt-4 mb-0 px-6">Filter</button>

                                        @if( isset( $searchData ) && count( (array)$searchData ) > 0 )
                                            <a href="{{ Route('password-overview') }}" class="btn btn-sm btn-light btn-lg mt-4 mb-0 mx-2 px-6">Clear</a>
                                        @endif
                                    </div>

                                </div>

                            </form>
                        </div>


                        <div class="table-responsive">

                            <table class="table table-flush" id="datatable-password-list">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{ __("general.type") }}</th>
                                    <th data-sortable="false">{{ __("general.id") }}</th>
                                    <th>{{ __("general.name") }}</th>
                                    <th>{{ __("general.active") }}?</th>
                                    <th data-sortable="false">{{ __("general.actions") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $passwordsData as $user )

                                    <tr>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ __("general.". strtolower( $user->type )) }}</span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $user->record_id }}</span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $user->name }}</span>
                                        </td>

                                        <td class="text-xs font-weight-bold">
                                            @if( $user->active )
                                                <span class="badge badge-success">{{ __("general.active") }}</span>
                                            @else
                                                <span class="badge badge-secondary">{{ __("general.in-active") }}</span>
                                            @endif
                                        </td>

                                        <td class="text-sm">
                                            <a href="{{ Route('user-edit', ['id' => $user->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
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
        if (document.getElementById('datatable-password-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-password-list", {
                searchable: false,
                perPageSelect: false,

            });
        }
    </script>

@endsection
