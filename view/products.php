<?php
session_start();
error_reporting(E_ERROR);
require_once "../utilities/Security.php";
require_once('../controller/ProductClass.php');
require_once('../controller/ProductController.php');
Security::checkHTTPS();
if (!isset($_SESSION['username'])) {
    Security::login();
}
if (isset($_GET['logout'])) {
    Security::logout();
}

$link_url = "add_update_product.php";
$link_heading = "Add Product to Inventory";

?>

<?php
    include_once('../includes/Header.php');
?>



<?php

// This handles the posts
require_once "../model/Server.php";
?>

<h1>Products List</h1>

<form class="d-flex">
    <input class="form-control me-sm-2" type="text" placeholder="Search">
    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
</form>

<?php 
$th = array();
$th[0] = "SKU";
$th[1] = "Image";
$th[2] = "Price";
$th[3] = "Title";
$th[4] = "Tags";
$th[5] = "Description";
$th[6] = "Quantity";
$th[7] = "Update";
$th[8] = "Delete";

$totalcount = 0;
$counter = 0;
?>
<table class="table table-hover">
    <thead>
    <tr>
    <?php
        // TABLE HEADERS
        for ($i = 0, $totalcount = count($th); $i < $totalcount; $i++) 
        { 
        ?>
            <th scope="col"><?php echo $th[$i]; ?></th>
        <?php    
        } 
        ?>
    </tr>
</thead>
<tbody>

<?php //PRINT OUT ALL THE ROWS
foreach(ProductController::getAllItems() as $product) : ?>
    <tr><!-- 1st Column the SKU -->
        <th scope="row">
            <?php echo $product->getSKU(); ?>
        </th>
    </tr>
    <tr><!-- 2nd Column The Image-->
        <th rowspan="2" scope="row">
            <a href="<?php echo $product->getImageURL();?>" target="_blank">
            <img src="<?php echo $product->getImageURL();?>" height="75"></a>
        </th>
</tr>
<tr><!-- 3nd Column The Price-->
    <th scope="row"><?php echo $product->getPrice(); ?>

    </th>
</tr>
<tr><!-- 4nd Column The Title-->
    <th scope="row"><?php echo $product->getTitle(); ?></th>
</tr>
<tr><!-- 5nd Column The Tags-->
    <th scope="row"><?php echo $product->getTags(); ?></th>
</tr>
<tr><!-- 6nd Column The Desc-->
    <th scope="row"><?php echo $product->getDescription(); ?></th>
</tr>
<tr><!-- 7nd Column The Quantity-->
    <th scope="row"><?php echo $product->getQuantity(); ?></th>
</tr>
<tr><!-- 8nd Column The Update-->
    <th scope="row">
    <form action="products.php" method="POST">
            <input type="hidden" name="hiddenvarupdateProduct" value="<?php echo $product->getNo(); ?>"/>
            <input type="submit" value="Update" name="updateproduct"/>
        </form>
    </th>
</tr>
<tr><!-- 9nd Column The Delete-->
    <th scope="row">
    <form action="products.php" method="POST">
            <input type="hidden" name="hiddenvardeleteProduct" value="<?php echo $product->getNo(); ?>"/>
            <input type="submit" value="Delete" name="deleteproduct"/>
        </form>
    </th>
</tr>  
<tr><th scope="row" colspan="<?php echo $totalcount;?>">
<?php 
    //Underneath each row put the image url
    echo $product->getImageURL(); ?></th>
</tr>
    <?php  
    $counter = $counter + 1;
    endforeach;?>
<tr>
    <th colspan="7"><?php echo $product->getSKU() . " Total Products"; ?></th>
</tr>

</tbody>
</table>
<h2><a href="<?php echo $link_url; ?>"><?php echo $link_heading; ?></a></h2>


<?php
include_once('../includes/Footer.php'); ?>

