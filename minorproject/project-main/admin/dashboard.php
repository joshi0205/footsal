<?php
include("../includes/adminLoginrequired.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }

    .row {
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .add {
        padding: 5px 10px;
        background: #ff7200;
        color: white;
        border: none;
        border-radius: 8px;
    }

    .add:hover {
        background: #e74d26;
        box-shadow: 2px 2px 5px silver;
        cursor: pointer;
    }
</style>
<?php include("../includes/adminnavbar.php"); ?>
<style>
    .dashboard {
        color: #ff7200;
    }

    .delete:hover {
        cursor: pointer;
        font-size: 25px !important;
    }
</style>
<div class="row">
    <h2>footsals</h2> <a href="add-footsal"><button class="add">Add New</button></a>

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
        <div class="boxmain">
            <div class="bgpic">
                <img src="../<?php echo $footsal->image; ?>" alt="#" />
            </div>
            <div class="ftitle">
                <?php echo $footsal->name; ?>
            </div>
            <div class="loc">
                <span>
                    <img src="../images/location.png" alt="#" /><a href="">
                        <?php echo $footsal->location; ?>
                    </a>
                </span>
            </div>
            <div class="row">
                <div class="row">
                    <div >
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
                    <?php echo $numberofRatings; ?>)
                    </div>
                </div>
                <a href="delete.php?id=<?php echo $id; ?>"> <span style="color:red;font-size:20px;"
                        class="fa fa-trash delete"></span></a>
            </div>
            <div style="padding: 8px;">
                Price: RS <?php echo $footsal->price; ?>
            </div>
            <br>
        </div>
        <?php
        }
        ?>
    </div>
</div>