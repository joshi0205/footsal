<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
</head>
<style>

  
  h2 {
    text-align: center;
  }
  
  form {
    max-width: 400px;
    margin: 40px auto;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  .formdesign {
    margin-bottom: 15px;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="number"],
  input[type="password"],
  select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  
  span.formerror {
    color: red;
    font-size: 14px;
    display: block;
    margin-top: 5px;
  }
  
  h4 {
    margin-top: 15px;
    text-align: center;
  }
  
  h4 a {
    color: blue;
  }
  
  .btnn {
    background-color: #4CAF50;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .btnn + .btnn {
    margin-left: 10px;
  }
  
  .btnn:hover {
    background-color: #45a049;
  }
</style>

<body>
  <?php include("includes/navbar.php") ?>
  <form name="myForm" action="signup" method="post">
            <h2>SIGNUP</h2>
            <div class="formdesign" id="name">
              <input type="text" name="name" placeholder="Enter your Full name ">
              <span class="formerror"></span>
            </div>
            <div class="formdesign" id="email">
              <input type="email" name="email" placeholder="Enter your email address">
              <span class="formerror"></span>
            </div>
            <div class="formdesign" id="phnum">
              <input type="number" name="mobile" placeholder="Enter your mobile number">
              <span class="formerror"></span>
            </div>
            <div class="formdesign" id="pswd">
              <input type="password" name="password" placeholder="Type password">
              <span class="formerror"></span>
            </div>
            <div class="formdesign" id="rpswd">
              <input type="password" name="cpassword" placeholder="Re-type password">
              <span class="formerror"></span>
            </div>
            <div class="formdesign" id="usertype">
              <select name="userType">
                <option value="user">User</option>
                <option value="owner">Owner</option>
              </select>
              <span class="formerror"></span>
            </div>
            <button type="submit" name="submit" class="btnn" id="btnn1" value="submit">Create</button>
            <button type="reset" class="btnn" id="btnn2" value="reset">Reset</button>
    <?php
    include("includes/dbconnection.php");
    if (isset($_POST['submit'])) {

      $name = mysqli_real_escape_string($con, $_POST["name"]);
      $email = mysqli_real_escape_string($con, $_POST["email"]);
      $mobile = mysqli_real_escape_string($con, $_POST["mobile"]);
      $password = mysqli_real_escape_string($con, $_POST["password"]);
      $cpassword = mysqli_real_escape_string($con, $_POST["cpassword"]);

      if (strlen($name < 3)) {
        echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Full Name must be atleast 3 character.</span>";
        return;
      } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Please enter valid email.</span>";
        return;
      } else if ($mobile < 0 || strlen($mobile) > 10) {
        echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Mobile Number must be atleast 10 digits.</span>";
        return;
      } else if (strlen($password) < 8) {
        echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Password must be atleast 8 characters.</span>";
        return;
      } else if ($password != $cpassword) {
        echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Re-type Password must be same.</span>";
        return;
      } else {
        if (mysqli_num_rows($con->query("SELECT * from footsal.users WHERE email='$email'")) != 0) {
          echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>This email already exists please login.</span>";
          return;
        }
        $password = md5($password);
        if ($con->query("INSERT INTO footsal.users (`name`,`email`,`mobile`,`password`) VALUES('$name','$email','$mobile','$password')")) {
          echo "<span style='margin:5px;color:green;display:block;padding:8px;background:white;border-radius:8px;'>Signup Successful.</span>";
        } else {
          echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Failed to Signup.</span>";

        }
      }


    }

    ?>

  </form>


</body>
<script>


</script>

</html>