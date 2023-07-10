<?php session_start(); ?>
<link rel="stylesheet" href="styles/nav.css" />
<div class="navbar">
    <div class="icon">
        <h2 class="logo">Footsal</h2>
    </div>

    <div class="menu">
        <ul>
            <li><a class="home" href="./">HOME</a></li>
            <li><a class="about" href="about">ABOUT US</a></li>
            <li><a class="contact" href="contact">CONTACT US</a></li>

            <?php
            if (isset($_SESSION['name'])) {

            echo '<li><a class="logout" href="logout">LOGOUT</a></li>';
                
            } else {
            ?>
            <li><a class="login" href="login">LOGIN</a></li>
            <li><a class="signup" href="signup">SIGNUP</a></li>
            <?php } ?>
        </ul>
    </div>
</div>