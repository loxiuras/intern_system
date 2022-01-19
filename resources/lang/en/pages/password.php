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

    "content" => [
        "add" => [
            "title"       => "Password details",
            "description" => "Please enter all password information below.",
        ]
    ]

];
