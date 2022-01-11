
@extends('layout.system')

@section('pageContent')

    @include('layout.banner')

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        <div class="container-fluid py-4">

            <div class="d-sm-flex justify-content-end">
                <div>
                    <a href="{{ Route('domain-add') }}" class="btn btn-icon btn-outline-white">
                        + {{ __("general.add-new-item", ["item" => strtolower(__("general.domain"))]) }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">

                            <table class="table table-flush" id="datatable-domain-list">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{ __("general.name") }}</th>
                                    <th>{{ __("general.host") }}</th>
                                    <th>{{ __("general.company") }}</th>
                                    <th>{{ __("general.active") }}?</th>
                                    <th data-sortable="false">{{ __("general.actions") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach( $domainsData as $domain )

                                        <tr>

                                            <td class="text-xs font-weight-bold">
                                                <span class="my-2 text-xs">
                                                    @if( !empty( $domain->parent_id ) )
                                                        -
                                                    @endif
                                                    {{ $domain->domainName }}
                                                </span>
                                            </td>

                                            <td class="text-xs font-weight-bold">
                                                <span class="my-2 text-xs">{{ $domain->hostName }}</span>
                                            </td>

                                            <td class="text-xs font-weight-bold">
                                                <span class="my-2 text-xs">{{ $domain->companyName }}</span>
                                            </td>

                                            <td class="text-xs font-weight-bold">
                                                @if( $domain->active )
                                                    <span class="text-success">Ja</span>
                                                @else
                                                    <span class="text-danger">Nee</span>
                                                @endif
                                            </td>

                                            <td class="text-sm">
    {{--                                            <a href="{{ Route('user-edit', ['id' => $user->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit user">--}}
    {{--                                                <i class="fas fa-user-edit text-secondary"></i>--}}
    {{--                                            </a>--}}

    {{--                                            <form class="mx-3" action="{{ Route('user-delete', ['id' => $user->id]) }}" method="POST" title="{{ $user->id }}" style="display: inline-block;">--}}
    {{--                                                @method('delete')--}}
    {{--                                                @csrf--}}

    {{--                                                <label for="deleteSubmit{{$user->id}}">--}}
    {{--                                                        <span data-bs-toggle="tooltip" data-bs-original-title="Delete product" style="cursor: pointer;">--}}
    {{--                                                            <i class="fas fa-trash text-secondary"></i>--}}
    {{--                                                        </span>--}}
    {{--                                                </label>--}}

    {{--                                                <input id="deleteSubmit{{$user->id}}" name="deleteSubmit{{$user->id}}" type="submit" style="display: none" />--}}
    {{--                                            </form>--}}
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
        if (document.getElementById('datatable-domain-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-domain-list", {
                searchable: false,
                perPageSelect: false,

            });
        }
    </script>

@endsection

