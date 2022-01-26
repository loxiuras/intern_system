<?php

return [

    "breadcrumb" => [
        "icon"       => "ni ni-book-bookmark",
        "controller" => "Tickets",
        "actions"    => [
            "overview" => [
                "name"  => "Overview",
                "title" => "Ticket overview",
            ],
            "add"      => [
                "name"  => "Add",
                "title" => "Add ticket",
            ],
            "edit"     => [
                "name"  => "Edit",
                "title" => "Edit ticket",
            ],
            "Delete"   => [
                "name"  => "Delete",
                "title" => "Delete ticket",
            ],
        ]
    ],

    "content" => [
        "add" => [
            "title"       => "Ticket details",
            "description" => "Please enter all ticket information below.",
        ],
    ],

    "price--subtext" => "Complete price for this ticket. Leave this field empty if price is unknown.",
    "time--subtext"  => "Spent/estimated time of ticket. Leave this field empty if no work has been done.",

    "invoice" => [
        "title"       => "Invoice information",
        "description" => "All invoice data is listed below.",
    ],

    "status_1" => [
        "title"     => "Open",
        "className" => "bg-gradient-primary",
    ],
    "status_2" => [
        "title"     => "Started",
        "className" => "bg-gradient-warning",
    ],
    "status_3" => [
        "title"     => "Completed",
        "className" => "bg-gradient-success",
    ],
    "status_4" => [
        "title"     => "Invoiced",
        "className" => "bg-gradient-info",
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
