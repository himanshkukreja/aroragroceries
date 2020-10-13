<?php
require("./partials/_db.php");

session_unset();
session_destroy();

$email = $_SESSION['user_email'];

$query = "UPDATE `iloveindia` SET `session_id` = NULL WHERE `iloveindia`.`email` = $email";
$result = mysqli_query($conn, $query);

header("location:http://localhost/aroragrceries/login.php");
?>