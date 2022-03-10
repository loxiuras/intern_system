<?php

return [

    "from" => [
        "name"  => "Van Suilichem Online",
        "email" => "no-reply@suilichem.com",
    ],
    "data" => [
        "logo" => "<img class='image' src='https://www.suilichem.com/assets/systems/email-logo.png' style='height: 30px;' height='30px' alt='Van Suilichem Online logo'>"
    ],
    "subject" => "Password changed | Van Suilichem Online",
    "structure"    => [
        "header" => ":logo<br><br>Hi :fullName",
        "body"   => "Your password has been changed!",
        "footer" => "<b>Kind regards,</b><br>Van Suilichem Online",
    ]

];
