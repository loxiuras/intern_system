
@extends('layout.system')

@section('css')

    .background-image {
        background-image: url( {!! url('img/backgrounds/login.jpg') !!} );
        background-size: cover;
        background-position: center;
    }

@endsection

@section('pageContent')

    <main class="main-content main-content-bg mt-0">
        <div class="page-header background-image min-vh-100">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="card z-index-0">

                            @include("auth.login.header")
                            @include("auth.login.form")

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('js')

    <script src="{{ url('js/plugins/NovaPasswordViewer.js') }}"></script>

@endsection
