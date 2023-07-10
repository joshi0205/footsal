<!DOCTYPE html>
<html lang="en">

<head>
  <title>footsal Booking</title>
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<style>
  .home {
    color: #ff7200;
  }

  .row {
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
</style>

<body>
  <div class="main">
    <?php include("includes/navbar.php");
    include("includes/dbconnection.php"); ?>
  </div>

  <div class="center">
    <div class="container">
      <?php
      $posts = $con->query("SELECT * from footsal.companies ORDER BY id DESC");

      while ($footsal = mysqli_fetch_object($posts)) {
        $id = $footsal->id;
        $ratingTotal = 0;
        $ratingavg = 0;
        $ratings = $con->query("SELECT * from footsal.ratings WHERE companyId='$id'");
        $numberofRatings = mysqli_num_rows($ratings);
        if ($numberofRatings != 0) {
          while ($ratingeach = mysqli_fetch_object($ratings)) {
            $ratingTotal = $ratingTotal + $ratingeach->rating;
          }
          $ratingavg = $ratingTotal / $numberofRatings;
        }

      ?>
      <a style="color:black;text-decoration:none;" href="book?id=<?php echo $id; ?>">
        <div class="boxmain">
          <div class="bgpic">
            <img src="<?php echo $footsal->image; ?>" alt="#" />
          </div>
          <div class="ftitle">
            <?php echo $footsal->name; ?>
          </div>
          <div class="loc">
            <span style="padding:8px;">
              <span class="fa fa-map-marker"></span>
              <?php echo $footsal->location; ?>

            </span>
          </div>
          <div class="row">
            <div class="row">
              <div>
                <?php
        for ($i = 0; $i < 5; $i++) {
          if ($i < $ratingavg) {
                ?>
                <span class="fa fa-star checked"></span>
                <?php } else {

                ?>
                <span class="fa fa-star"></span>
                <?php }
        } ?>

              </div>
              <div>
                (
                <?php echo $numberofRatings; ?> ratings)
              </div>
            </div>

          </div>
          <div style="padding: 8px;">
            Price: RS
            <?php echo $footsal->price; ?>
          </div>
        </div>
      </a>
      <?php
      }
      ?>
    </div>
  </div>