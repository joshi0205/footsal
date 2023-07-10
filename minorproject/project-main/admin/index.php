<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<style>
    .login {
        color: #ff7200;
    }
   
</style>

<body>
   
<br><br><br><br><br><br><br>
    <form class="form" method="post" action="index" onsubmit="return validateform()">
        <h2>Admin Login</h2>
        <div class="inp">
            <label for="uname"></label>
            <input type="email" name="email" placeholder="Enter email" required>

            <label for="password"></label>
            <input type="password" placeholder="Enter Password" name="password" required>
        </div>


        <?php
        include("../includes/dbconnection.php");
        if (isset($_POST['login'])) {

            $email = mysqli_real_escape_string($con, $_POST["email"]);
            $password = md5(mysqli_real_escape_string($con, $_POST["password"]));
            $user = $con->query("SELECT * FROM footsal.admin WHERE email='$email' AND password='$password'");
            if (mysqli_num_rows($user) == 1) {
                while ($row = mysqli_fetch_object($user)) {
                    $_SESSION['adminemail'] = $row->email;
                    $_SESSION['adminpassword'] = $row->password;
                    header("location:./dashboard");
                }
            } else {
                echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Incorrect email or password.</span>";

            }

        }

        ?>
        <button type="submit" name="login" class="lg" id="lgb">Login</button>


       

</body>
<script>


</script>

</html>