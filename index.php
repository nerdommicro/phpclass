<?php
session_start();
error_reporting(E_ERROR);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu - E-Commerce Inventory</title>
    <link rel="stylesheet" href="./css/bootswatchTheme.css">
    <style>
        * {
            box-sizing: border-box;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin: 0;
            padding: 0;
        }
        button {
        margin-left: 20px;}
        table {
            margin: 20px;
        }

        body {
            background-color: white;
        }

        .main-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(3, 1fr);

        }

        .box1 {
            background-color: #EE2E84; /*magenta*/
            border-radius: 10px;
        }

        .box2 {
            background-color: navy;
            border-radius: 10px;
        }

        .box3 {
            background-color: #8DC63F; /*green*/
            border-radius: 10px;
        }

        .box4 {
            background-color: purple;
            border-radius: 10px;
        }

        .box5 {
            background-color: yellow;
            border-radius: 10px;
        }
/* Controls the button heighrt*/
        div {
            row-gap: 10px;
            column-gap: 10px;
            height: 200px;

            padding: 5px;
        }

        .box1 {
            grid-column: 1/3;
        }

        .box2 {
            grid-column: 3/5;
        }

        .box3 {
            grid-column: 1/2;
        }

        .box4 {
            grid-column: 2/5;
        }

        .box5 {
            grid-column: 1/5;
        }

        </style>
</head>
<body>
<header>
    <?php
    include_once('./includes/NavMain.php');
    ?>
</header>
<div class="main-container">
    <div class="box1">&nbsp;</div>
    <div class="box2">&nbsp;</div>
    <div class="box3">&nbsp;</div>
    <div class="box4">&nbsp;</div>
    <div class="box5">&nbsp;</div>
</div>
<h1>Welcome to E-Commerce Inventory 1.0</h1>
<div class="d-flex">
        <button class="btn btn-info my-2 my-sm-0" onclick="window.location.href = './view/login.php'">Login</button>
        <button class="btn btn-info my-2 my-sm-0" onclick="window.location.href = './view/register.php'">Sign Up</button>
</div>
<div class="main-container">
    <div class="box1">&nbsp;</div>
    <div class="box2">&nbsp;</div>
    <div class="box3">&nbsp;</div>
    <div class="box4">&nbsp;</div>
    <div class="box5">&nbsp;</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


<?php
include_once('./includes/Footer.php');


