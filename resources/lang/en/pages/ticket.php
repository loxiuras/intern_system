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
    "scheduled_date--subtext"  => "Scheduled date for this ticket, leave this field empty if no date is necessary.",
    "scheduled_end_date--subtext"  => "Scheduled end date for this ticket, leave this field empty if no end date is necessary.",
    "time--subtext"  => "Spent/estimated time of ticket. Leave this field empty if no work has been done.",
    "invoice--subtext" => "Is this ticket going to be invoiced?",

    "invoice" => [
        "title"       => "Invoice information",
        "description" => "All invoice data is listed below.",
    ],

    "status_0" => [
        "title"         => "All",
        "className"     => "bg-gradient-dark",
        "iconClassName" => "fas fa-layer-group",
    ],
    "status_1" => [
        "title"         => "Open",
        "className"     => "bg-gradient-secondary",
        "iconClassName" => "fas fa-pen-alt",
    ],
    "status_2" => [
        "title"         => "Started",
        "className"     => "bg-gradient-primary",
        "iconClassName" => "fas fa-hammer",
    ],
    "status_3" => [
        "title"         => "Completed",
        "className"     => "bg-gradient-warning",
        "iconClassName" => "fas fa-check-double",
    ],
    "status_4" => [
        "title"         => "Ready to invoice",
        "className"     => "bg-gradient-success",
        "iconClassName" => "fas fa-coins",
    ],
    "status_5" => [
        "title"         => "Archived",
        "className"     => "bg-gradient-info",
        "iconClassName" => "fas fa-box-open",
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
