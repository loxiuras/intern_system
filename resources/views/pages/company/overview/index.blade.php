
@extends('layout.system')

@section('pageContent')

    @include('layout.banner')

    @include("layout.sidebar.index")

    <main class="main-content position-relative border-radius-lg">

        @include("layout.nav.index")

        <div class="container-fluid py-4">


            <div class="d-sm-flex justify-content-end">
                <div>
                    <a href="{{ Route('company-add') }}" class="btn btn-icon btn-outline-white">
                        + {{ __("general.add-new-item", ["item" => strtolower(__("general.company"))]) }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-company-list">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{ __("general.company-name") }}</th>
                                    <th data-sortable="false">{{ __("general.address") }}</th>
                                    <th data-sortable="false">{{ __("general.email") }}</th>
                                    <th data-sortable="false">{{ __("general.telephone") }}</th>
                                    <th data-sortable="false">{{ __("general.actions") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $companiesData as $company )

                                    <tr>
                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $company->name }}</span>
                                        </td>
                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">{{ $company->street_name }} {{ $company->house_number }}{{ $company->house_number_extra }}, {{ $company->postal_code }} {{ $company->city }}</span>
                                        </td>
                                        <td class="text-xs font-weight-bold">
                                            <a href="mailto:{{ $company->primary_email }}" class="my-2 text-xs text-secondary">{{ $company->primary_email }}</a>
                                        </td>
                                        <td class="text-xs font-weight-bold">
                                            <a href="tel:{{ $company->telephone }}" class="my-2 text-xs text-secondary">{{ $company->telephone }}</a>
                                        </td>
                                        <td class="text-sm">
                                            <a href="{{ Route('company-edit', ['id' => $company->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                <i class="far fa-edit text-normal"></i>
                                            </a>


{{--                                            <form action="{{ Route('user-delete', ['id' => $user->id]) }}" method="POST" title="{{ $user->id }}" style="display: inline-block;">--}}
{{--                                                @method('delete')--}}
{{--                                                @csrf--}}

{{--                                                <label for="deleteSubmit{{$user->id}}">--}}
{{--                                                        <span class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete product">--}}
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
        if (document.getElementById('datatable-company-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-company-list", {
                searchable: true,
                perPageSelect: false,

            });
        }
    </script>

@endsection
