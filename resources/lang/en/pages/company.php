<?php

return [

    "breadcrumb" => [
        "icon"       => "ni ni-world",
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

    "name--subtext"       => "The general name of the company.",
    "legal-name--subtext" => "The full legal name, e.g., the Chamber of Commerce name.",

    "active--subtext" => "Is the company active? If not, it won't be available in filters and/or invoices e.g.",

    "domain-overview--subtext" => "View all domains of this company",

    "content" => [
        "add" => [
            "title"       => "Company details",
            "description" => "Please enter all company information below.",

            "title--invoice"       => "Invoice settings",
            "description--invoice" => "Set the invoice data below.",

            "title--users"       => "Users overview",
            "description--users" => "All users connected to this company",

            "title--domain-overview"       => "Domain overview",
            "description--domain-overview" => "All domains connected to this company",
        ]
    ],

    "connect-user" => [
        "title"       => "Connect a new user",
        "description" => "Select your new user in the selectbox below.",
    ],

    "import-csv" => [
        "title"       => "Import CSV file",
        "description" => "Please check if the file you want to upload is an .csv and not an excel file.",
    ],

    "notification" => [
        "import" => [
            "success" => [
                "title" => "Import successfully!",
                "text"  => "All records are successfully imported.",
            ],
            "error" => [
                "title" => "Import error!",
                "text"  => "Something went wrong with the import.<br>Please check your CSV-file and try again.",
            ],
        ],
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
