<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Image;
use App\Models\Manual;
use Illuminate\Http\Request;

class ManualController extends Controller
{

    public function overview(Request $request)
    {
        $where = [];
        $where[] = ['manuals.reference', '!=', ''];
        $where[] = ['manuals.title', '!=', ''];

        $searchData = new \stdClass();
        if( $request->title ) {
            $where[] = ['manuals.title', 'like', '%'.$request->title.'%'];
            $searchData->title = $request->title;
        };

        $manualsData = Manual::where($where)->get();

        return view('pages.manual.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "manual", "overview" ),
            "manualsData"   => $manualsData,
            "searchData"    => $searchData,
        ]);
    }

    public function add()
    {
        $manualData = new \stdClass();

        return view('pages.manual.add.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "manual", "add" ),
            "manualData"   => $manualData,
        ]);
    }

    public function edit( int $id )
    {
        $manualData = Manual::find( $id );

        $contentsData = Content::getAllFromType( 'manual', $id, false );

        return view('pages.manual.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "manual", "edit" ),
            "manualData"    => $manualData,
            "contentsData"  => $contentsData,
        ]);
    }

    public function item( string $reference )
    {
         $manualData = Manual::select([
            'manuals.*',
            "u1.name as createdUserName",
            "u1.insertion as createdUserInsertion",
            "u1.last_name as createdUserLastName",
            "u2.name as updatedUserName",
            "u2.insertion as updatedUserInsertion",
            "u2.last_name as updatedUserLastName",
        ])
            ->where([ ["manuals.reference", $reference] ])
            ->join('users as u1', 'u1.id', '=', 'manuals.created_user_id')
            ->join('users as u2', 'u2.id', '=', 'manuals.updated_user_id')
            ->first();

        if ( !$manualData ) {

            return Redirect( Route("manual-overview") )->with([
                "notificationActive"    => true,
                "notificationType"      => "danger",
                "notificationIconClass" => "fas fa-bell",
                "notificationTitle"     => __("pages/manual.notification.unknown-item.title"),
                "notificationSubTitle"  => null,
                "notificationText"      => __("pages/manual.notification.unknown-item.text"),
            ]);
        }

        $contentsData = Content::where([
            ["type", "manual"],
            ["record_id", $manualData->id],
            ["active", 1],
        ])->get();

        $contentImagesData = [];
        foreach ( $contentsData as $content ) {
            $contentId = !empty( $content->id ) ? (int)$content->id : 0;

            if ( !empty( $contentId ) ) {

                $contentImagesData[ $contentId ] = Image::where([
                    ['type', 'content'],
                    ['record_id', $contentId]
                ])->get();
            }
        }

        return view('pages.manual.item.index', [
            "manualData"        => $manualData,
            "contentsData"      => $contentsData,
            "contentImagesData" => $contentImagesData
        ]);
    }
}
