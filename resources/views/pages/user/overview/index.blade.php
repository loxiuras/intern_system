
@extends('layout.system')

@section('bodyAttributes', 'class=NovaPreloadSpinner data-time=1000')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/plugins/NovaPreloadSpinner.css') }}">
@endsection

@section('pageContent')

    @include('layout.banner')

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
                                                {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->diffForHumans() : __("general.not-available-short") }}
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                @if( $user->active )
                                                    <span class="badge bg-gradient-success">{{ __("general.active") }}</span>
                                                @else
                                                    <span class="badge bg-gradient-secondary">{{ __("general.in-active") }}</span>
                                                @endif
                                            </td>
                                            <td class="text-sm">
                                                <a href="{{ Route('user-edit', ['id' => $user->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>

                                                <form class="mx-3" action="{{ Route('user-delete', ['id' => $user->id]) }}" method="POST" title="{{ $user->id }}" style="display: inline-block;">
                                                    @method('delete')
                                                    @csrf

                                                    <label for="deleteSubmit{{$user->id}}">
                                                        <span data-bs-toggle="tooltip" data-bs-original-title="Delete product" style="cursor: pointer;">
                                                            <i class="fas fa-trash text-secondary"></i>
                                                        </span>
                                                    </label>

                                                    <input id="deleteSubmit{{$user->id}}" name="deleteSubmit{{$user->id}}" type="submit" style="display: none" />
                                                </form>
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
    <script src="{{ url('js/plugins/NovaPreloadSpinner.js') }}"></script>

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
