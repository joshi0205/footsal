<?php
session_start();
include("../includes/dbconnection.php");
if (isset($_SESSION['adminemail']) && isset($_SESSION['adminpassword'])) {

    $email = mysqli_real_escape_string($con, $_SESSION['adminemail']);
    $password = mysqli_real_escape_string($con, $_SESSION['adminpassword']);
    $user = $con->query("SELECT * FROM footsal.admin WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($user) == 1) {

    } else {
        header("location:./");

        echo 'incorrect credientials';
        return;
    }

} else {
    header("location:./");

    echo 'no session';
    return;
}

?>