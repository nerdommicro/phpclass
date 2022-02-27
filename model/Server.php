<?php
session_start();
error_reporting(E_ERROR);


require_once "../utilities/Security.php";
Security::checkHTTPS();
require_once "../controller/UserClass.php";
require_once "../controller/UserController.php";
require_once('../controller/ProductClass.php');
require_once('../controller/ProductController.php');
require_once('Validator.php'); //Validate passwords and quantity/price

$username = "";
$email    = "";
$errors = array();



// Buttons from the PRODUCTS page WITH BUTTONS FOR DELETE/UPDATE IN THE TABLE
// -> send to the add/update page
if (isset($_POST['updateproduct'])) {
    if (isset($_POST['hiddenvarupdateProduct'])) {
        $returnurl = "./add_update_product.php";
        header("Location: " . $returnurl ."?hiddenvarupdateProduct=" . $_POST['hiddenvarupdateProduct']);
    }
    unset($_POST['updateproduct'], $_POST['hiddenvarupdateProduct']);
}

if (isset($_POST['deleteproduct'])) {
    if (isset($_POST['hiddenvardeleteProduct'])) {
        //$returnurl = stay on current page
        ProductController::deleteProduct($_POST['hiddenvardeleteProduct']);
    }
    unset($_POST['deleteproduct'], $_POST['hiddenvardeleteProduct']);
}
// Buttons from the ADD/UPDATE PRODUCTS page WITH BUTTONS FOR CANCEL/SAVE IN THE TABLE
// -> returns to the PRODUCTS page

if (isset($_POST['cancelsaveproduct'])) {
    $returnurl = "./products.php";
    header("Location: " . $returnurl);
}

// add product / or update it - passed from the add/update page
if (isset($_POST['saveproduct'])) { 
    $returnurl = "./products.php";
    if (isset($_POST['hiddenvarsaveproduct'])) 
    {                
        $id = $_POST['hiddenvarsaveproduct']; //can be -1 (add) or an actual live id (update)
        $sku = $_POST['sku']; 
        $title = $_POST['title']; 
        $price =$_POST['price']; 
        $imageurl =$_POST['imageurl']; 
        $tags =$_POST['tags']; 
        $description = $_POST['description']; 
        $quantity = $_POST['quantity']; 

            if (empty($sku)) { $errors[] = "Sku is required. "; }
            if (empty($title)) { $errors[] = "Title is required. "; }
            if (empty($price)) { $errors[] = "Price is required. "; }
            if (empty($imageurl)) { $errors[] = "Image URL is required. "; }
            if (empty($tags)) { $errors[] = "Tags required: Enter at least one tag. "; }
            if (empty($description)) { $errors[] = "Description is required. "; }
            if (empty($quantity)) { $errors[] = "Quantity is required. "; }

            $p_error = Validator\isValidPrice($price);
            if (!empty($p_error)) { $errors[] = $p_error; }

            $q_error = Validator\isValidQuantity($quantity);
            if (!empty($q_error)) { $errors[] = $q_error; }

            $valid = ProductController::isSKU($_POST['sku']); 
            if($valid){  
                $errors[] = "SKU already exists. ";
            }    

            if (count($errors) === 0) {

                if($id === -1)
                {
                    $product = new ProductClass($sku, $title, $price, $imageurl, $tags, $description, $quantity);
                    if(ProductController::AddProduct($product)) 
                    {
                        $_SESSION['success'] = "Product Added Successfully. ";                        
                    }
                } 
                else
                {
                    $product = new ProductClass($sku, $title, $price, $imageurl, $tags, $description, $quantity);
                    $product->setSKU($sku);
                    $product->setTitle($sku);
                    $product->setPrice($price);
                    $product->setImageURL($imageurl);
                    $product->setTags($tags);
                    $product->setQuantity($quantity);


                    if(ProductController::UpdateProduct($product))
                    {
                        $_SESSION['success'] = "Product Updated! ";



                    }
                }
                header('Location: ' .  $returnurl);
            }//end if any errors
    } //end isset $_POST['hiddenvarsaveproduct']);
}
    
// LOGIN form
if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) { $errors[] = "Username required";    }
    if (empty($password)) {
        $errors[] = "Password required";    }
    $u_error = Validator\isValidUserId($username);
    if (!empty($u_error)) { $errors[] = $u_error; }

    if (count($errors) === 0) {
        $valid = UserController::validUser($_POST['username'], $_POST['password']); 
        if($valid){           
            $user = UserController::getUser($_POST['username']);            
            $email = $user->getEMail();            
            $f_name = $user->getFirstName();
            $l_name = $user->getLastName();
            $zipcode = $user->getZipCode();
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['f_name'] = $f_name;
            $_SESSION['l_name'] = $l_name;
            $_SESSION['zip_code'] = $zipcode;
            $_SESSION['success'] = "Logged in";
            header('location: index.php');
        }
        else 
        {
            $errors[] = "Invalid username or password. ";
        }
    }
}

// REGISTER
if (isset($_POST['reg_user'])) {    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $zipcode = $_POST['zip_code'];

    if (empty($username)) { $errors[] = "Username is required. "; }
    if (empty($email)) { $errors[] = "Email is required. "; }
    if (empty($password1)) { $errors[] = "Password is required. "; }
    if ($password1 !== $password2) { $errors[] = "Passwords do not match. ";   }
    if (empty($f_name)) { $errors[] = "First name is required. "; }
    if (empty($l_name)) { $errors[] = "Last name is required. "; }
    if (empty($zipcode)) { $errors[] = "Zip code is required. "; }
    $pw_error = Validator\isValidPassword($password1);
    if (!empty($pw_error)) { $errors[] = $pw_error; }
    $valid = UserController::isUser($_POST['username']); 
    if($valid){  
        $errors[] = "Username already exists";
    }
    $e_error = Validator\isValidEMail($email);
    if (!empty($e_error)) { $errors[] = $e_error; }
    if (count($errors) === 0) {
        $password = $password1;
        //hash the password before sending it
        $user = new UserClass(
            $username,
            password_hash($password, PASSWORD_DEFAULT),
            $f_name,
            $l_name,
            $email,            
            $zipcode);
        //This adds the user and returns the result of whether it was added or not  
        if(UserController::AddUser($user)) {    
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $f_name . ' ' . $l_name;
            $_SESSION['success'] = "Logged in";
            header('location: index.php');
        }
    }
}


