<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    # FIX: Replace this email with recipient email
    // $mail_to = "ghandwashand@gmail.com";
    // $mail_to = "electromm@yandex.ru";
    $mail_to = "super.woorg@yandex.ru";
    
    # Sender Data
    $name  = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    
    if ( empty($name) ) {
        # Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Пожалуйста заполните форму и повторите снова.";
        exit;
    }

    if ( empty($email) ) {
        # Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Пожалуйста заполните форму и повторите снова.";
        exit;
    }


    $subject = 'studymatch BOOK A FREE CONSULTATION';
    
    # Mail Content
    $content .= "Name: $name\n Email: $email\n";

    # email headers.
    $headers = "From: studymatch &lt;$name&gt;";

    # Send the email.
    $success = mail($mail_to, $subject, $content, $headers);

    if ($success) {
        # Set a 200 (okay) response code.
        http_response_code(200);
        echo "Спасибо! Ваше сообщение успешно отправленно.";
    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "С отправкой сообщения возникли проблемы, попробуйте снова.";
    }

}
