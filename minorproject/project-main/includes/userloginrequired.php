<?php
include("includes/dbconnection.php");
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {

    $email = mysqli_real_escape_string($con, $_SESSION['email']);
    $password = mysqli_real_escape_string($con, $_SESSION['password']);
    $user = $con->query("SELECT * FROM footsal.users WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($user) == 1) {
        while($u=mysqli_fetch_object($user)){
            $userid=$u->id;

        }
    } else {
        header("location:./login");

        echo 'incorrect credientials';
        return;
    }

} else {
    header("location:./login");

    echo 'no session';
    return;
}

?>