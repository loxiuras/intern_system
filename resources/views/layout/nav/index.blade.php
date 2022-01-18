
<nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">

        @include("layout.nav.breadcrumb")

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">

                    <!-- ToDo: Edit location and translation -->
                    <a href="#" class="nav-link text-white font-weight-bold px-0" target="_blank">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Hello, {{ $loginUserData->name }}</span>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 ps-3 d-flex align-items-center">
                    <a aria-controls="navSettings" class="nav-link text-white p-0" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-cog cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" id="navSettings" aria-labelledby="navSettings">

                        <li class="mb-1">
                            <a class="dropdown-item border-radius-md" href="{{ Route('user-edit', ['id' => $loginUserData->id]) }}">
                                <div class="d-flex py-1 d-flex flex-row justify-content-start">
                                    <div class="">
                                        <i class="fa fa-user-cog me-1"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center ps-2">
                                        <h6 class="text-sm font-weight-normal mb-0">
                                            <span class="font-weight-bold">{{ __("general.profile") }}</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!--
                        ToDo: Edit location and translation
                        <li class="mb-1">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1 d-flex flex-row justify-content-start">
                                    <div class="">
                                        <i class="fa fa-umbrella-beach me-1"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center ps-2">
                                        <h6 class="text-sm font-weight-normal mb-0">
                                            <span class="font-weight-bold">Vrije dagen</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        -->

                        <li class="mb-1">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1 d-flex flex-row justify-content-start">
                                    <div class="">
                                        <i class="fa fa-sign-out me-1"></i>
                                    </div>
                                    <form action="{{ Route('logout') }}" method="post">
                                        @csrf
                                        <div class="d-flex flex-column justify-content-center ps-2">
                                            <label for="logout" class="text-sm font-weight-normal mb-0">
                                                <span class="font-weight-bold">{{ __("general.sign-out") }}</span>
                                            </label>
                                            <input type="submit" id="logout" name="logout" style="display: none;">
                                        </div>
                                    </form>
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>

    </div>
</nav>
