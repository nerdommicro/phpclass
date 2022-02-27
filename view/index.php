<?php
session_start();
error_reporting(E_ERROR);

require_once "../utilities/Security.php";

if (!isset($_SESSION['username'])) {
    Security::login();
}
if (isset($_GET['logout'])) {
    Security::logout();
}
?>

<?php
    include_once('../includes/Header.php');
?>

<h1>Home Page</h1>

<div class="content">
    <!-- welcome message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <!-- logged in user links -->
    <?php  
    
    if (isset($_SESSION['username'])) : ?>

        <h2>Welcome <?php echo $_SESSION['fullname'];?></h2>

        <p>Click a link above to manage products and listings</p>

        <p> 
            <a href="index.php?logout='1'" style="color: purple;">logout</a> 
        </p>

    <?php endif ?>

</div>




<?php
include_once('../includes/Footer.php'); ?>

