<?php

return [

    "from" => [
        "name"  => "Van Suilichem Online",
        "email" => "no-reply@suilichem.com",
    ],
    "data" => [
        "logo" => "<img class='image' src='https://www.suilichem.com/assets/systems/email-logo.png' style='height: 30px;' height='30px' alt='Van Suilichem Online logo'>"
    ],
    "subject" => "Password reset | Van Suilichem Online",
    "structure"    => [
        "header" => ":logo<br><br>Hi :fullName",
        "body"   => "We've received a request to reset the password for your account associated with :email.<br>No changes have been made to your account yet.<br><br>You can reset your password by click the link below:<br><br>:resetButton<br><br>If you did not request a new password, please let uw know immediately by replying to this email.",
        "footer" => "<b>Kind regards,</b><br>Van Suilichem Online",
    ]

];
