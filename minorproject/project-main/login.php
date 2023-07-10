
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<style>
    .login {
        color: #ff7200;
    }
</style>

<body>
    <?php include("includes/navbar.php") ?>
    <br><br><br>

    <form class="form" method="post" action="login" onsubmit="return validateform()">
        <h2>Login Here</h2>
        <div class="inp">
            <label for="uname"></label>
            <input type="email" name="email" placeholder="Enter email" required>

            <label for="password"></label>
            <input type="password" placeholder="Enter Password" name="password" required>
        </div>


        <?php
        include("includes/dbconnection.php");
        if (isset($_POST['login'])) {

            $email = mysqli_real_escape_string($con, $_POST["email"]);
            $password = md5(mysqli_real_escape_string($con, $_POST["password"]));
            $user = $con->query("SELECT * FROM footsal.users WHERE email='$email' AND password='$password'");
            if (mysqli_num_rows($user) == 1) {
                while ($row = mysqli_fetch_object($user)) {
                    $_SESSION['email'] = $row->email;
                    $_SESSION['name'] = $row->name;
                    $_SESSION['password'] = $row->password;
                    $_SESSION['mobile'] = $row->mobile;
                    header("location:./");
                }
            } else {
                echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Incorrect email or password.</span>";

            }

        }

        ?>
        <button type="submit" name="login" class="lg" id="lgb">Login</button>


        <p class="link">Don't have an account ?<br>
            <a href="signup">Sign up </a> here</a>
        </p>
        <p class="liw" s>Log in with</p>

        <div class="icons">
            <a href="#">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="logo-twitter"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="logo-google"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="logo-skype"></ion-icon>
            </a>
    </form>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>
<script>


</script>

</html>