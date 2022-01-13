
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
                        <div class="card-header">

                            <form action="{{ Route('domain-overview') }}" method="POST">
                                @csrf

                                <div class="row mt-3">

                                    <div class="col-12 col-sm-2">
                                        <label for="domain_name">{{ __("general.domain") }}</label>
                                        <input class="multisteps-form__input form-control @error('domain_name') is-invalid @enderror"
                                               type="text"
                                               name="domain_name"
                                               id="domain_name"
                                               value="{{ old('domain_name', (!empty( $searchData->domain_name ) ? $searchData->domain_name : "")) }}"
                                               placeholder="E.g. www.suilichem.com" />
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <label for="domain_name">{{ __("general.host") }}</label>
                                        <select name="host_id" id="choices-host-id" class="multisteps-form__input form-control @error('host_id') is-invalid @enderror">
                                            <option value="0">{{ __("general.no-choice") }}</option>
                                            @foreach( $hostsData as $host )
                                                @if( isset( $searchData->host_id ) && (int)$host->id === (int)$searchData->host_id )
                                                    <option value='{{ $host->id }}' selected="selected">{{ $host->name }} - {{ $host->ip_address }}</option>
                                                @else
                                                    <option value='{{ $host->id }}'>{{ $host->name }} - {{ $host->ip_address }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <label for="domain_name">{{ __("general.company") }}</label>
                                        <select name="company_id" id="choices-company-id" class="multisteps-form__input form-control @error('company_id') is-invalid @enderror">
                                            <option value="0">{{ __("general.no-choice") }}</option>
                                            @foreach( $companiesData as $company )
                                                @if( isset( $searchData->company_id ) && (int)$company->id === (int)$searchData->company_id )
                                                    <option value='{{ $company->id }}' selected="selected">{{ $company->name }}</option>
                                                @else
                                                    <option value='{{ $company->id }}'>{{ $company->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 col-sm-3 d-flex align-items-end">
                                        <button type="submit" class="btn btn-sm btn-dark btn-lg mt-4 mb-0 px-6">Filter</button>

                                        @if( isset( $searchData ) && count( (array)$searchData ) > 0 )
                                            <a href="{{ Route('domain-overview') }}" class="btn btn-sm btn-light btn-lg mt-4 mb-0 mx-2 px-6">Clear</a>
                                        @endif
                                    </div>

                                </div>
                            </form>

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
                                @php
                                    $prevRecordId = 0;
                                @endphp
                                <tbody>
                                    @foreach( $domainsData as $domain )
                                        <tr>

                                            @if( empty( $domain->parent_id ) )
                                                @php
                                                    $prevRecordId = $domain->id;
                                                @endphp
                                            @endif

                                            <td class="text-xs font-weight-bold">
                                                <span class="my-2 text-xs">
                                                    @if( !empty( $domain->parent_id ) )
                                                        @if ( $domain->parent_id === $prevRecordId )
                                                            <i class="fas fa-level-up-alt fa-rotate-90 fa-fw" style="margin-right: 10px;"></i>
                                                        @else
                                                            <i class="fas fa-reply fa-fw" style="margin-right: 10px; color: #e3e3e3;"></i>
                                                        @endif
                                                        {{ $domain->domainName }}
                                                    @else
                                                        <b>{{ $domain->domainName }}</b>
                                                    @endif
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
                                                    <span class="badge badge-success">{{ __("general.active") }}</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ __("general.in-active") }}</span>
                                                @endif
                                            </td>

                                            <td class="text-sm">
                                                <a href="{{ Route('domain-edit', ['id' => $domain->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                    <i class="fas fa-edit text-secondary"></i>
                                                </a>

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
    <script src="{{ url('js/plugins/choices.js') }}"></script>
    <script >
        if (document.getElementById('choices-host-id')) {
            let hostElement = document.getElementById('choices-host-id');
            const hostSearch = new Choices(hostElement, {
                searchEnabled: true,
                searchPlaceholderValue: '{{ __("general.search-for", ["item" => __("general.host")]) }}',
                shouldSort: false,
            });
        };

        if (document.getElementById('choices-company-id')) {
            var companyElement = document.getElementById('choices-company-id');
            const companySearch = new Choices(companyElement, {
                searchEnabled: true,
                searchPlaceholderValue: '{{ __("general.search-for", ["item" => __("general.company")]) }}',
                shouldSort: false,
            });
        };
    </script>

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

