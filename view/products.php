<?php
session_start();
error_reporting(E_ERROR);
require_once "../utilities/Security.php";
require_once('../controller/ProductClass.php');
require_once('../controller/ProductController.php');
Security::checkHTTPS();
if (!isset($_SESSION['username']))
{
    Security::login();
}
if (isset($_GET['logout']))
{
    Security::logout();
}

$link_url = "add_update_product.php";
?>

<?php
include_once('../includes/Header.php');
require_once "../model/Server.php";
?>

<h1>Products List</h1>

<form class="d-flex">
    <input class="form-control me-sm-2" type="text" placeholder="Search">
    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
</form>

<?php
$totalcount = 9;
?>

<table class="table table-hover">
     <tr>
         <th scope="col">SKU</th>
         <th scope="col">Image</th>
         <th scope="col">Price</th>
         <th scope="col">Title</th>
         <th scope="col">Tags</th>
         <th scope="col">Description</th>
         <th scope="col">Quantity</th>
         <th scope="col">Update</th>
         <th scope="col">Delete</th>         
     </tr>        
    
    <?php //PRINT OUT each ROW
    foreach (ProductController::getAllItems() as $product) :
        ?>
        <tr>
            <td scope="row"><?php echo $product->getSKU(); ?></td>
            <td scope="row"><a href="<?php echo $product->getImageURL(); ?>" target="_blank"><img alt="Product" src="<?php echo $product->getImageURL(); ?>" height="75"></a></td>
            <td scope="row"><?php echo $product->getPrice(); ?></td>
            <td scope="row"><?php echo $product->getTitle(); ?></td>
            <td scope="row"><?php echo $product->getTags()?></td>
            <td scope="row"><?php echo $product->getDescription(); ?></td>
            <td scope="row"><?php echo $product->getQuantity(); ?></td>
            <td scope="row"><form action="products.php" method="POST">
                    <input type="hidden" name="hiddenvarupdateProduct" value="<?php echo $product->getNo(); ?>"/>
                    <input type="submit" value="Update" name="updateproduct"/></form></td>
            <td scope="row"><form action="products.php" method="POST">
                    <input type="hidden" name="hiddenvardeleteProduct" value="<?php echo $product->getNo(); ?>"/>
                    <input type="submit" value="Delete" name="deleteproduct"/></form></td> 
        </tr>        
        <tr>
            <td>ImageURL</td>
            <td><?php echo $product->getImageURL(); ?></td>
            <td colspan="7">&nbsp;</td>
        </tr>
        <?php
        $counter = $counter + 1;    //Current product 
    endforeach;                     //End ForEach loop 
    //end tag
    ?>
    <tr>
        <td colspan="9"><?php echo $counter; ?> Total Products</td>
    </tr>
     <tr>
        <td colspan="9"><h2><a href="<?php echo $link_url; ?>">Add New</a></h2></td>
    </tr>    
</table>

<?php include_once('../includes/Footer.php'); 

