<?php

return [

    "breadcrumb" => [
        "icon"       => "ni ni-badge",
        "controller" => "Manuals",
        "actions"    => [
            "overview" => [
                "name"  => "Overview",
                "title" => "Manual overview",
            ],
            "add" => [
                "name"  => "Add",
                "title" => "Add manual",
            ],
            "edit" => [
                "name"  => "Edit",
                "title" => "Edit manual",
            ],
        ]
    ],

    "content" => [
      "add" => [
          "title"       => "Manual information",
          "description" => "All manual data is listed below.",
      ]  ,
    ],

    "notification" => [
        "unknown-item" => [
            "title" => "Unknown item",
            "text"  => "The given reference is not found.",
        ],
    ],

];
