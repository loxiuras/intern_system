<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-white">
            <i class="{{ $sidebarData->breadcrumbData->icon }}"></i>
        </li>
        <li class="breadcrumb-item text-sm text-white">
            <span class="opacity-5 text-white">{{ $sidebarData->breadcrumbData->controller }}</span>
        </li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $sidebarData->breadcrumbData->action }}</li>
    </ol>
    <h6 class="font-weight-bolder mb-0 text-white">{{ $sidebarData->breadcrumbData->title }}</h6>
</nav>
