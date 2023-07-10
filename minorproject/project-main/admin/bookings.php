<?php
include("../includes/adminLoginrequired.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>

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
    .bookings {
        color: #ff7200;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    td {
        padding: 8px;
    }

    th {
        padding: 10px 20px;
    }

    tr {
        border: 2px solid black;
    }
</style>
<br><br><br>
<center>
    <table>
        <tr>
            <th>
                id
            </th>
            <th>
                Name
            </th>
            <th>
                Mobile
            </th>
            <th>
                footsal
            </th>
            <th>
                Location
            </th>
            <th>
                Date
            </th>
            <th>
                Time
            </th>
            <th>
                Price
            </th>
            <th>
                Actions
            </th>
        </tr>
        <?php
    $getBookings = $con->query("SELECT * FROM footsal.bookings ORDER BY id DESC ");
    while ($order = mysqli_fetch_object($getBookings)) {
        $userid = $order->userId;
        $orderId = $order->id;
        $companyId = $order->companyId;
        $date = $order->date;
        $time = $order->time;

        $getUser = $con->query("SELECT * FROM footsal.users WHERE id='$userid' ");
        while ($user = mysqli_fetch_object($getUser)) {
            $userName = $user->name;
            $userMobile = $user->mobile;

        }
        $getCompany = $con->query("SELECT * FROM footsal.companies WHERE id='$companyId' ");
        $companyName = "Deleted";
            $companyLocation = "Deleted";
            $companyimage = "Deleted";
            $price = "Deleted";
        while ($company = mysqli_fetch_object($getCompany)) {
            $companyName = $company->name;
            $companyLocation = $company->location;
            $companyimage = $company->image;
            $price = $company->price;

        }
        echo "<tr>
        <td>$orderId</td>
        <td>$userName</td>
        <td>$userMobile</td>
        <td>$companyName</td>
        <td>$companyLocation</td>
        <td>$date</td>
        <td>$time</td>
        <td>$price</td>
        <td style='padding:0px;'><a class='delete' href='delete-booking.php?id=$orderId'><center>Delete</center></a></td>
        </tr>";
    }
    ?>

    </table>
</center>
<style>
    .delete{
        display:block;
        width: 100%;
        height: 100%;
        padding: 8px 0px;
        text-decoration: none;
        color:red;
        align-content: center;
    }
    .delete:hover{
        background:red;
        color:white;
    }
    tr:hover{
        background:#f0e8e8;
    }
</style>