
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
                                            <span class="my-2 text-xs">{{ $user->type }}</span>
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
