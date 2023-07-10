<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>contact us</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/contactus.css">
</head>
<style>
  .contact {
    color: #ff7200;
  }
</style>

<body>
  <?php include("includes/navbar.php") ?>



  <form method="post" action="contact.php">
    <input type="text" id="fname" name="fname" placeholder="Your First name.. " required>
    <input type="text" id="lname" name="lname" placeholder="Your last name.. " required>
    <textarea id="subject" name="message" placeholder="Write your message.." style="height:170px " required></textarea>
    <input type="submit" name="submit" value="Submit">
    <?php
    include("includes/dbconnection.php");
    if (isset($_POST['submit'])) {

      $fname = mysqli_real_escape_string($con, $_POST["fname"]);
      $lname = mysqli_real_escape_string($con, $_POST["lname"]);
      $message = mysqli_real_escape_string($con, $_POST["message"]);
      if ($con->query("INSERT INTO footsal.contact_form (`first_name`,`last_name`,`message`) VALUES('$fname','$lname','$message')")) {
        echo "<span style='margin:5px;color:green;display:block;padding:8px;background:white;border-radius:8px;'>Successfully sent your message.</span>";
      } else {
        echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Failed to send message.</span>";

      }

    }

    ?>
  </form>


</body>



</html>