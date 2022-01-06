<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return mixed
     */
    public function getLoginUserData()
    {
        return User::find(Auth::user()->id);
    }

    /**
     * @param string $controller
     * @param string $action
     * @return \stdClass
     */
    public function getSidebarData( string $controller, string $action ): \stdClass
    {
        $sidebarData = new \stdClass();

        $sidebarData->breadcrumbData = $this->buildBreadcrumb( $controller, $action );

        return $sidebarData;
    }

    /**
     * @param string $controller
     * @param string $action
     * @return \stdClass
     */
    private function buildBreadcrumb( string $controller, string $action ): \stdClass
    {
        $breadcrumbData = new \stdClass();

        $breadcrumbData->icon       = __("pages/{$controller}.breadcrumb.icon");
        $breadcrumbData->controller = __("pages/{$controller}.breadcrumb.controller");
        $breadcrumbData->action     = __("pages/{$controller}.breadcrumb.actions.{$action}.name");
        $breadcrumbData->title      = __("pages/{$controller}.breadcrumb.actions.{$action}.title");

        return $breadcrumbData;
    }
}
