<?php

session_start();

$code = $_POST['code'];

if (($code != $_SESSION["code"]) || !isset($_SESSION["code"]) || empty($_SESSION["code"])) {
    unset($_SESSION["code"]);
    unset($code);
    header("Location:index.php?p=1");
    exit;
} else { //http://www.toolheap.com/test-mail-server-tool/

    unset($_SESSION["code"]);
    unset($code);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $letter = $_POST['letter'];

    $header = "From: $firstname $lastname <$email>\n";
    $header .= "X-Sender: <$email>\n";
    $header .= "X-Mailer: PHP\n";
    $header .= "X-Priority: 1\n";
    $header .= "Return-Path: <$email>\n";
    $header .= "Content-Type: text/html; charset=UTF-8\n";

    $message = "Send data: \n\n firstname: $firstname \n name: $lastname \n\n email: $email \n city: $city \n letter: $letter";
    $to = "localhost";
    $subject = "Test letter";

    //mail($to,$subject,$message);

    if (mail($to, $subject, $message, $header))
        echo "mail was sent!";

    //mail($to,$subjest,$message);
}

?>