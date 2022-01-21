
<div class="modal fade" id="importCompanyCsvModel" tabindex="-1" role="dialog" aria-labelledby="importCompanyCsvModel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">

                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-primary text-gradient">{!! __("pages/company.import-csv.title") !!}</h3>
                        <p class="mb-0">{!! __("pages/company.import-csv.description") !!}</p>
                    </div>

                    <div class="card-body pb-3">
                        <form role="form text-left" method="POST" action="{{ Route('company-import') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <label for="user_id">{{ __("general.file") }}</label>
                                    <div class="input-group mb-3" style="width: 100%;">
                                        <input type="file" name="file" id="file" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg w-100 mt-2 mb-0">{{ __("general.import") }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade" id="importCompanyCsvModelBackDrop" style="display: none;"></div>
