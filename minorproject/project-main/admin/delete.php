<?php
include("../includes/adminLoginrequired.php");
if (isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);
    if($con->query("DELETE FROM footsal.companies WHERE id='$id'")){
        header("location:dashboard");
    }else{
        echo "error deleting";
    }
    
}
?>