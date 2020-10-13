<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "arora_groceries";

$conn = mysqli_connect($servername, $username, $password, $database);

// starting session
session_start();

function random()
{
    $n = 30;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#!$%^&*()_+=-{}:">?<,./;"';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

function sending_mail($email, $enquiry)
{
    $to = "prince.mishra1384@gmail.com";
    $subject = $email;
    $message = $enquiry;
    $header = "From: enquiry@akalspring.com";

    mail($to, $subject, $message, $header);
}

function encrypt($password)
{
    $hash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 10));
    return $hash;
}

function verify($password, $hash)
{
    if (password_verify($password, $hash)) {
        return True;
    } else {
        return False;
    }
}

function checking_session($conn)
{
    if (isset($_SESSION['user_email'])) {
        $email = $_SESSION['user_email'];

        $query = "SELECT * FROM `iloveindia` WHERE `email`= '$email'";
        $result = mysqli_query($conn, $query);

        $data = mysqli_fetch_assoc($result);
        if ($data['session_id'] == $_SESSION['id']) {
            return True;
        } else {
            return False;
        }
    } else {
        return False;
    }
}
?>