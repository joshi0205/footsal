<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Book footsal</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/contactus.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>
<style>
  .contact {
    color: #ff7200;
  }
</style>

<body>
  <?php include("includes/navbar.php") ?>
  <?php
  include("includes/userloginrequired.php");
  ?>

  <form action="book?id=<?php echo $_GET['id'] ?>" method="post" style="color:white!important;">

    <div class="date">
      Date:<input type="date" name="date" value="" required style="width:100%;padding:12px;">
    </div>
    <br>
    <div class="time">
      Time:<select name="time" required>
        <option value="8-9">8-9 AM</option>
        <option value="9-10">9-10 AM</option>
        <option value="9-10">10-11 AM</option>
        <option value="10-11">11-12 PM</option>
        <option value="12-1">12-1 PM</option>
        <option value="1-2">1-2 PM</option>
        <option value="2-3">2-3 PM</option>
        <option value="3-4">3-4 PM</option>
        <option value="4-5">4-5 PM</option>
        <option value="5-6">5-6 PM</option>
        <option value="6-7">6-7 PM</option>
      </select>

    </div>
    <?php
    if (isset($_POST['submit']) && isset($_POST['date']) && isset($_POST['time']) && isset($_GET['id'])) {

      $date = mysqli_real_escape_string($con, $_POST['date']);
      $id = mysqli_real_escape_string($con, $_GET['id']);
      $time = mysqli_real_escape_string($con, $_POST['time']);
      if ($con->query("INSERT INTO footsal.bookings (`userId`,`companyId`,`date`,`time`) VALUES('$userid','$id','$date','$time')")) {
        echo "<span style='margin:5px;color:green;display:block;padding:8px;background:white;border-radius:8px;'>Booking Successful. We will contact you very soon.</span>";

      } else {
        echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Failed to book.</span>";

      }
    }
    ?>
     <button class="payment" style="padding:10px;width:100%;background:Green;border-radius:10px;border:none;"
      name="submit" type="submit">Make Payment</button><br><br>
    <button class="book" style="padding:10px;width:100%;background:#ff7200;border-radius:10px;border:none;"
      name="submit" type="submit">Book the
      time</button>
    <br><br>
    <h2>Rate This:</h2>
    <div>
      <style>
        .fa-star:hover {
          color: yellow;
          cursor: pointer;
        }
      </style>
      <script>
        function rate(rating) {
          window.location.href = "rating?id=<?php echo $_GET['id']; ?>&rating=" + rating;
        }
      </script>
      <?php
      for ($i = 0; $i < 5; $i++) {

      ?>
      <span class="fa fa-star" onclick="rate('<?php echo $i + 1; ?>')"></span>


      <?php }
      ?>

      <?php
      if (isset($_GET['message'])) {
        if ($_GET['message'] == "success") {
          echo "<span style='margin:5px;color:green;display:block;padding:8px;background:white;border-radius:8px;'>Rating Successful.</span>";

        } else {
          echo "<span style='margin:5px;color:red;display:block;padding:8px;background:white;border-radius:8px;'>Rating Failed.</span>";
        }
      }
      ?>
    </div>

  </form>
  <br>

  <style>
    .book:hover {
      background: #e74d26;
      box-shadow: 2px 2px 5px silver;
      cursor: pointer;
    }
  </style>

</body>

</html>