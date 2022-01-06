
<div class="collapse navbar-collapse  w-auto h-auto h-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">

        <li class="nav-item mt-3">
            <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __("sidebar.settings") }}</h6>
        </li>


        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#usersModule" class="nav-link" aria-controls="usersModule" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-app text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">{{ __('sidebar.users.main') }}</span>
            </a>
            <div class="collapse" id="usersModule">
                <ul class="nav ms-4">
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ Route('user-overview') }}">
                            <span class="sidenav-normal">{{ __('sidebar.users.overview') }}</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ Route('user-add') }}">
                            <span class="sidenav-normal">{{ __('sidebar.users.new-item') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


    </ul>
</div>
