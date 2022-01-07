
@extends('layout.system')

@section('pageContent')

    <div class="min-height-300 bg-primary position-absolute w-100 bannerBackground"></div>

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        <div class="container-fluid py-4">

            <div class="d-sm-flex justify-content-end">
                <div>
                    <a href="{{ Route('user-add') }}" class="btn btn-icon btn-outline-white">
                        + {{ __("general.add-new-item", ["item" => strtolower(__("general.user"))]) }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-user-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th>{{ __("general.first-name") }}</th>
                                        <th>{{ __("general.last-name") }}</th>
                                        <th>{{ __("general.email") }}</th>
                                        <th data-sortable="false">{{ __("general.last-login") }}</th>
                                        <th>{{ __("general.active") }}?</th>
                                        <th data-sortable="false">{{ __("general.actions") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $usersData as $user )

                                        <tr>

                                            <td class="text-xs font-weight-bold">
                                                <span class="my-2 text-xs">{{ $user->name }}</span>
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                <span class="my-2 text-xs">{{ $user->insertion }} {{ $user->last_name }}</span>
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                <span class="my-2 text-xs">{{ $user->email }}</span>
                                            </td>
                                            <td class="text-xs">
                                                {{ \Carbon\Carbon::parse($user->last_login)->diffForHumans() }}
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                @if( $user->active )
                                                    <span class="text-success">Ja</span>
                                                @else
                                                    <span class="text-danger">Nee</span>
                                                @endif
                                            </td>
                                            <td class="text-sm">
                                                <a href="{{ Route('user-edit', ['id' => $user->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>

                                                <!-- ToDo: Add delete action; -->
                                                <a href="javascript:;" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                                    <i class="fas fa-trash text-secondary"></i>
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
        if (document.getElementById('datatable-user-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-user-list", {
                searchable: true,
                perPageSelect: false,

            });
        }
    </script>

@endsection
