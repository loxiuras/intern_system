
<div class="collapse navbar-collapse  w-auto h-auto h-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">

        <li class="nav-item">
            <a href="{{ Route('dashboard') }}" class="nav-link" >
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-spaceship text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">{{ __('sidebar.dashboard.main') }}</span>
            </a>
        </li>

        <li class="nav-item mt-3">
            <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __("sidebar.modules") }}</h6>
        </li>

        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#ticketsModule" class="nav-link" aria-controls="ticketsModule" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-book-bookmark text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">{{ __('sidebar.tickets.main') }}</span>
            </a>
            <div class="collapse" id="ticketsModule">
                <ul class="nav ms-4">
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ Route('ticket-overview') }}">
                            <span class="sidenav-normal">{{ __('sidebar.tickets.overview') }}</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ Route('ticket-add') }}">
                            <span class="sidenav-normal">{{ __('sidebar.tickets.new-item') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#manualsModule" class="nav-link" aria-controls="manualsModule" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-hat-3 text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">{{ __('sidebar.manuals.main') }}</span>
            </a>
            <div class="collapse" id="manualsModule">
                <ul class="nav ms-4">
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ Route('manual-overview') }}">
                            <span class="sidenav-normal">{{ __('sidebar.manuals.overview') }}</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ Route('manual-add') }}">
                            <span class="sidenav-normal">{{ __('sidebar.manuals.new-item') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item mt-3">
            <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __("sidebar.settings") }}</h6>
        </li>

        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#usersModule" class="nav-link" aria-controls="usersModule" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-app text-primary text-sm opacity-10"></i>
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

        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#companiesModule" class="nav-link" aria-controls="companiesModule" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-building text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">{{ __('sidebar.companies.main') }}</span>
            </a>
            <div class="collapse" id="companiesModule">
                <ul class="nav ms-4">
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ Route('company-overview') }}">
                            <span class="sidenav-normal">{{ __('sidebar.companies.overview') }}</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ Route('company-add') }}">
                            <span class="sidenav-normal">{{ __('sidebar.companies.new-item') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#domainsModule" class="nav-link" aria-controls="domainsModule" role="button" aria-expanded="false">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-world text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">{{ __('sidebar.domains.main') }}</span>
            </a>
            <div class="collapse" id="domainsModule">
                <ul class="nav ms-4">
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ Route('domain-overview') }}">
                            <span class="sidenav-normal">{{ __('sidebar.domains.overview') }}</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ Route('domain-add') }}">
                            <span class="sidenav-normal">{{ __('sidebar.domains.new-item') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a href="{{ Route('password-overview') }}" class="nav-link" >
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-key-25 text-secondary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">{{ __('sidebar.passwords.main') }}</span>
            </a>
        </li>

    </ul>
</div>
