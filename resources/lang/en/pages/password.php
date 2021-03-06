<?php


return [

    "breadcrumb" => [
        "icon"       => "ni ni-badge",
        "controller" => "Passwords",
        "actions"    => [
            "overview" => [
                "name"  => "Overview",
                "title" => "Password overview",
            ],
            "add"      => [
                "name"  => "Add",
                "title" => "Add Password",
            ],
            "edit"     => [
                "name"  => "Edit",
                "title" => "Edit Password",
            ],
            "Delete"   => [
                "name"  => "Delete",
                "title" => "Delete Password",
            ],
        ]
    ],

    "active--subtext" =>  "Is the password active? Older back-up password can be set in-active for storage.",
    "password-overview--subtext" =>  "Add new password to this item",

    "content" => [
        "add" => [
            "title"       => "Password details",
            "description" => "Please enter all password information below.",

            "title--password"       => "Password details",
            "description--password" => "All password connected to this item are listed below.",
        ]
    ],

    "notification" => [
        "save" => [
            "success" => [
                "title" => "Saved successfully",
                "text"  => "All data is saved successfully.",
            ],
            "missing-fields" => [
                "title" => "Missing fields",
                "text"  => "Looks like some fields are not filled in or not valid.",
            ],
            "error" => [
                "title" => "Error",
                "text"  => "Something went wrong, please try again later.",
            ],
        ],
    ],
];
