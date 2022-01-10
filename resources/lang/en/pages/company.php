<?php

return [

    "breadcrumb" => [
        "icon"       => "ni ni-badge",
        "controller" => "Companies",
        "actions"    => [
            "overview" => [
                "name"  => "Overview",
                "title" => "Company overview",
            ],
            "add"      => [
                "name"  => "Add",
                "title" => "Add company",
            ],
            "edit"     => [
                "name"  => "Edit",
                "title" => "Edit company",
            ],
            "Delete"   => [
                "name"  => "Delete",
                "title" => "Delete company",
            ],
        ]
    ],

    "legal-name--subtext" => "The full legal name, e.g., the Chamber of Commerce name.",

    "content" => [
        "add" => [
            "title"       => "Company details",
            "description" => "Please enter all company information below.",

            "title--invoice"       => "Invoice settings",
            "description--invoice" => "Set the invoice data below.",
        ]
    ]

];
