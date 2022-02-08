<?php

return [

    "breadcrumb" => [
        "icon"       => "ni ni-badge",
        "controller" => "Dashboard",
        "actions"    => [
            "overview" => [
                "name"  => "Dashboard",
                "title" => "Dashboard overview",
            ],
        ]
    ],

    "info" => [
        "user" => [
            "title"   => "Amount of users",
            "subtext" => "current active users <small>(last 7 days)</small>",
        ],
        "company" => [
            "title"   => "Amount of companies",
            "subtext" => "added this month",
        ],
        "domain" => [
            "title"   => "Amount of domains",
            "subtext" => "added this month",
        ],
        "ticket" => [
            "title"   => "Amount of complete tickets",
            "subtext" => "completed this month",
        ]
    ],
];
