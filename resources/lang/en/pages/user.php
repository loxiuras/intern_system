<?php

return [

    "breadcrumb" => [
        "icon"       => "ni ni-app",
        "controller" => "Users",
        "actions"    => [
            "overview" => [
                "name"  => "Overview",
                "title" => "User overview",
            ],
            "add"      => [
                "name"  => "Add",
                "title" => "Add user",
            ],
            "edit"     => [
                "name"  => "Edit",
                "title" => "Edit user",
            ],
            "Delete"   => [
                "name"  => "Delete",
                "title" => "Delete user",
            ],
        ]
    ],

    "content" => [
        "add" => [
            "title"       => "User details",
            "description" => "Please enter all user information below.",

            "title--password"       => "Passwoord settings",
            "description--password" => "Choose a new password. Make sure it is secure enough.<br>We recommend using at least one capital letter, number and special character.",
        ]
    ]

];
