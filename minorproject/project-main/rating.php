<?php
session_start();
include("includes/userloginrequired.php");
if (isset($_GET['id']) && isset($_GET['rating'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $rating = mysqli_real_escape_string($con, $_GET['rating']);
    if ($rating <= 5 && $rating >= 0) {
        if (mysqli_num_rows($con->query("SELECT * FROM footsal.ratings WHERE companyId='$id' AND userId='$userid'")) == 0) {

            if ($con->query("INSERT INTO footsal.ratings (`companyId`,`rating`,`userId`) VALUES('$id','$rating','$userid')")) {
                header("location:book?id=$id&message=success");
            } else {
                header("location:book?id=$id&message=fail");
            }

        } else {
            if ($con->query("UPDATE footsal.ratings SET rating='$rating' WHERE companyId='$id' AND userId='$userid'")) {
                header("location:book?id=$id&message=success");
            } else {
                header("location:book?id=$id&message=fail");
            }
        }
    } else {
        header("location:book?id=$id&message=fail");
    }
}
?>