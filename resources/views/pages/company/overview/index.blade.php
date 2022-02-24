
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
                    <span class="btn btn-icon btn-outline-white NovaModel" data-nova-model-body-class="modal-open" data-nova-model-target="importCompanyCsvModel">
                        {{ __("general.import-csv") }}
                    </span>

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
                                    <th data-sortable="false">{{ __("general.active") }}?</th>
                                    <th data-sortable="false">{{ __("general.actions") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $companiesData as $company )

                                    <tr>
                                        <td class="text-xs font-weight-bold">
                                            <span class="my-2 text-xs">
                                                {{ $company->name }}

                                                @if( $company->amount_of_passwords )
                                                    <i class="fas fa-key" style="margin-left: 5px;" title="{{ __("general.has-passwords") }}"></i>
                                                @endif
                                            </span>
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
                                        <td class="text-xs font-weight-bold">
                                            @if( $company->active )
                                                <span class="badge bg-gradient-success">{{ __("general.active") }}</span>
                                            @else
                                                <span class="badge bg-gradient-secondary">{{ __("general.in-active") }}</span>
                                            @endif
                                        </td>
                                        <td class="text-sm">
                                            <a href="{{ Route('company-edit', ['id' => $company->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                <i class="fas fa-edit text-secondary"></i>
                                            </a>


                                            <form action="{{ Route('company-delete', ['id' => $company->id]) }}" method="POST" title="{{ $company->id }}" style="display: inline-block;">
                                                @method('delete')
                                                @csrf

                                                <label for="deleteSubmit{{$company->id}}">
                                                        <span class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete product" style="cursor: pointer;">
                                                            <i class="fas fa-trash text-secondary"></i>
                                                        </span>
                                                </label>

                                                <input id="deleteSubmit{{$company->id}}" name="deleteSubmit{{$company->id}}" type="submit" style="display: none" />
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

    @include("pages.company.overview.import-csv-file")

@endsection

@section('js')

    <script src="{{ url('js/sidebar.js') }}"></script>

    <script src="{{ url('js/plugins/datatables.js') }}"></script>
    <script src="{{ url('js/plugins/NovaPreloadSpinner.js') }}"></script>
    <script src="{{ url('js/plugins/NovaModel.js') }}"></script>
    <script>
        if (document.getElementById('datatable-company-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-company-list", {
                searchable: true,
                perPageSelect: false,
                perPage: 15,
            });
        }
    </script>

@endsection
