<?php
include("../includes/adminLoginrequired.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add footsal</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<script>

</script>
<?php include("../includes/adminnavbar.php"); ?>
<style>
    .dashboard {
        color: #ff7200;
    }

    input[type=file] {
        display: none;
    }
</style>
<br><br>
<form class="form" method="post" action="add-footsal" enctype="multipart/form-data" onsubmit="return validateform()">
    <h2>Add footsal</h2>
    <div class="inp">
        <input type="text" name="name" placeholder="Enter footsal Name" required>

        <label for="location"></label>
        <input type="text" placeholder="Enter Location" name="location" required>
        <input type="number" placeholder="Price in Rs" name="price" required>
        <br><br>
        <label for="image">
            <center> <img id="image-logo" src="../images/camera-icon.png" width="200px"></center>
        </label>
        <input type="file" name="image" id="image" onchange="imageUploaded()">
    </div>
    <script>
        function imageUploaded() {
            var input = document.getElementById("image");
            var fReader = new FileReader();
            fReader.readAsDataURL(input.files[0]);
            fReader.onloadend = function (event) {
                var img = document.getElementById("image-logo");
                img.src = event.target.result;
            }

        }
    </script>

    <?php
    include("../includes/dbconnection.php");

    if (isset($_POST['add'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["tmp_name"]) . mysqli_real_escape_string($con, basename($_FILES["image"]["name"]));
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $name = mysqli_real_escape_string($con, $_POST["name"]);
        $location = mysqli_real_escape_string($con, $_POST["location"]);
        $price = mysqli_real_escape_string($con, $_POST["price"]);
        if ($con->query("INSERT into footsal.companies (`name`,`location`,`image`,`price`) VALUES('$name','$location','$target_file','$price')")) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "../" . $target_file);
            echo "<span style='margin:5px;color:green;display:block;padding:8px;background:white;border-radius:8px;'>footsal Added Succesfully.</span>";

        } else {
            echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Incorrect email or password.</span>";

        }
    }



    ?>
    <button type="submit" name="add" class="lg" id="lgb">Add footsal</button>


</form>