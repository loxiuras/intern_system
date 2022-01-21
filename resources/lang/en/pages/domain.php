<?php

return [

    "breadcrumb" => [
        "icon"       => "ni ni-badge",
        "controller" => "Domains",
        "actions"    => [
            "overview" => [
                "name"  => "Overview",
                "title" => "Domain overview",
            ],
            "add"      => [
                "name"  => "Add",
                "title" => "Add domain",
            ],
            "edit"     => [
                "name"  => "Edit",
                "title" => "Edit domain",
            ],
            "Delete"   => [
                "name"  => "Delete",
                "title" => "Delete domain",
            ],
        ]
    ],

    "is-production--subtext" => "Is the domain for production? Will mostly be invoiced. <br>For example you can set a development environment to non-production.",
    "active--subtext"        => "Is the domain active? If not, it won't be available in filters and/or invoices e.g.",

    "content" => [
        "add" => [
            "title"       => "Domain details",
            "description" => "Please enter all domain information below.",
        ]
    ],

];
