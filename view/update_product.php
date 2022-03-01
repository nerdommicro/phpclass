<?php 
require_once "../model/ServerProducts.php";
$heading = "Update product";



//If user hits 'ADD NEW link' or UPDATE button on the products page - load the product
if (isset($_GET['hiddenvarupdatep']))
{
    $id = $_GET['hiddenvarupdatep'];
    $product = ProductController::getProductByNo($id);
}

$th = array();
$th[0] = "SKU";
$th[1] = "Title";
$th[2] = "Price";
$th[3] = "ImageURL";
$th[4] = "Tags";
$th[5] = "Description";
$th[6] = "Quantity";

include_once('../includes/Header.php');
?>
<form action="update_product.php" method="POST">
   
    <fieldset>
        <div class="form-group row mx-auto">
            <label for="sku1" class="col-sm-3 form-control-lg my-2"><?php echo $th[0];?></label>
            <div class="col-sm-6">
                <input type="text" maxlength="50" class="form-control form-control-lg" id="sku1" name="sku" value="<?php echo $product->getSKU();?>" required>
            </div>
        </div>
        <div class="form-group row mx-auto">
            <label for="title1" class="col-sm-3 form-control-lg my-2"><?php echo $th[1]; ?></label>
            <div class="col-sm-6">
                <input type="text" maxlength="250" class="form-control form-control-lg" id="title1" name="title" value="<?php echo $product->getTitle();?>" required>
            </div>
        </div>
        <div class="form-group row mx-auto">
            <label for="price1" class="col-sm-3 form-control-lg my-2"><?php echo $th[2]; ?></label>
            <div class="col-sm-6">
                <input type="text" maxlength="250" class="form-control form-control-lg" id="price1" name="price" value="<?php echo $product->getPrice();?>" required>
            </div>
        </div>
        <div class="form-group row mx-auto">
            <label for="imageurl1" class="col-sm-3 form-control-lg my-2"><?php echo $th[3]; ?></label>
            <div class="col-sm-6">
                <input type="text" maxlength="500" class="form-control form-control-lg" id="imageurl1" name="imageurl" value="<?php echo $product->getImageURL();?>" required>
            </div>
        </div>
        <div class="form-group row mx-auto">
            <label for="tags1" class="col-sm-3 form-control-lg my-2"><?php echo $th[4]; ?></label>
            <div class="col-sm-6">
                <input type="text" maxlength="200" class="form-control form-control-lg" id="tags1" name="tags" value="<?php echo $product->getTags();?>" required>
            </div>
        </div>
        <div class="form-group row mx-auto">
            <label for="description1" class="col-sm-3 form-control-lg my-2"><?php echo $th[5]; ?></label>
            <div class="col-sm-6">
                <input type="text" maxlength="500" class="form-control form-control-lg" id="description1" name="description" value="<?php echo $product->getDescription();?>" required>
            </div>
        </div>
        <div class="form-group row mx-auto">
            <label for="quantity1" class="col-sm-3 form-control-lg my-2"><?php echo $th[6]; ?></label>
            <div class="col-sm-6">
                <input type="text" maxlength="250" class="form-control form-control-lg" id="quantity1" name="quantity" value="<?php echo $product->getQuantity();?>" required>
            </div>
        </div>

        <p class="errors">
        <?php include('../includes/errors.php');?>
        </p>

        <input type="hidden" value="<?php echo $id;?>" name="update_product_id">
        <button name="update_product" type="submit" class="btn btn-primary">Update</button>
        <button class="btn btn-info my-2 my-sm-0" onclick="window.location.href = 'products.php'">Cancel</button>

    </fieldset>

</form>
<?php
include_once('../includes/Footer.php');
