<?php
include("../includes/adminLoginrequired.php");
if (isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);
    if($con->query("DELETE FROM footsal.bookings WHERE id='$id'")){
        header("location:bookings");
    }else{
        echo "error deleting";
    }
    
}
?>