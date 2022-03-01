<?php
session_start();
error_reporting(E_ERROR);

require_once "../utilities/Security.php";
Security::checkHTTPS();
$returnurl = "./products.php";
require_once('../controller/ProductClass.php');
require_once('../controller/ProductController.php');
require_once('Validator.php'); //Validate stuff like quantity/price

$errors = array();

$sku = $_POST['sku'];
$title = $_POST['title'];
$price = $_POST['price'];
$imageurl = $_POST['imageurl'];
$tags = $_POST['tags'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];

function checkValidateProduct()
{
    if (empty($sku)) {
        $errors[] =  "Sku is required. ";
    }
    if (empty($title)) {
        $errors[] = "Title is required. ";
    }
    if (empty($price)) {
        $errors[] = "Price is required. ";
    }
    if (empty($imageurl)) {
        $errors[] = "Image URL is required. ";
    }
    if (empty($tags)) {
        $errors[] = "Tags required: Enter at least one tag. ";
    }
    if (empty($description)) {
        $errors[] = "Description is required. ";
    }
    if (empty($quantity)) {
        $errors[] = "Quantity is required. ";
    }
    $p_error = Validator\isValidPrice($price);
    if (!empty($p_error)) {
        $errors[] = $p_error;

    }
    $q_error = Validator\isValidQuantity($quantity);
    if (!empty($q_error)) {
        $errors[] = $q_error;
    }

}

function checkSkuExists()
{
    $valid = ProductController::isSKU($_POST['sku']);
    if ($valid) {
        $errors[] = "SKU already exists. ";
    }
}


if (isset($_POST['add_product'])) {
    checkValidateProduct();
    checkSkuExists();

    if (count($errors) === 0) {
        $product = new ProductClass($sku, $title, $price, $imageurl, $tags, $description, $quantity);
        if (ProductController::AddProduct($product)) {
            $_SESSION['successp'] = "Product Added";
            header('location: products.php');
        }
    }
}

if (isset($POST['update_product'])) {
    $id = $_POST['update_product_id'];
    checkValidateProduct();
    checkSkuExists();

    if (count($errors) === 0) {
        $product = ProductController::getProductByNo($id);
        $product->setSKU($sku);
        $product->setTitle($sku);
        $product->setPrice($price);
        $product->setImageURL($imageurl);
        $product->setTags($tags);
        $product->setDescription($tags);
        $product->setQuantity($quantity);

        ProductController::UpdateProduct($product);
    }
}


// -> send to the update page
if (isset($_POST['pass_update_product'])) {
        $fwdurl = "update_product.php";
        header("Location: " . $fwdurl . "?hiddenvarupdatep=" . $_POST['hiddenvarupdatep']);
}

//This works
if (isset($_POST['delete_product'])) {
    ProductController::deleteProduct($_POST['hiddenvardeletep']);
    unset($_POST['delete_product'], $_POST['hiddenvardeletep']);
}
