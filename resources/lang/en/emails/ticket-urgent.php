<?php

return [

    "from" => [
        "name"  => "Van Suilichem Online",
        "email" => "no-reply@suilichem.com",
    ],
    "to" => [
        "name"  => "Van Suilichem Online",
        "email" => "support@suilichem.com",
    ],
    "data" => [
      "logo-location" => "<img class='image' src='https://www.suilichem.com/assets/systems/email-logo.png' style='height: 30px;' height='30px' alt='Van Suilichem Online logo'>",
    ],
    "subject" => "Urgent ticket created by :name | Van Suilichem Online",
    "structure"    => [
        "header" => ":logo<br><br>",
        "body"   => ":name created an urgent ticket. Please view the tickets, :click-here<br><br><b>Company</b>: :company<br><b>Title</b>: :title",
        "footer" => "<b>Kind regards,</b><br>Van Suilichem Online",
    ]

];
