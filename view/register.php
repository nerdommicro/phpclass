<?php 
require_once "../model/Server.php";

$username = $_POST['username'];
$email = $_POST['email'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$zipcode = $_POST['zip_code'];
$heading = "Create Account";

include_once('../includes/Header.php');
?>

<form action="register.php" method="POST">
   
    <fieldset>


        <!-- User ID 5-25 chars-->
        <div class="form-group row mx-auto">
            <label for="u-id" class="col-sm-3 form-control-lg my-2">User Name</label>
            <div class="col-sm-6">
                <input type="text" minlength="5" maxlength="25" class="form-control form-control-lg" id="u-id" name="username" value="<?php echo $username; ?>" placeholder="User Id - 5-25 characters" required>
                
            </div>
        </div>
        <!-- Password max 8-18 chars-->
        <div class="form-group row mx-auto">
            <label for="pwd" class="col-sm-3 form-control-lg my-2">Password</label>
            <div class="col-sm-6">
                <input type="password"  minlength="8" maxlength="18" class="form-control form-control-lg" id="pwd" name="password1" placeholder="Password 8-18 characters: 1 Upper, Lower, Number & Special" required>
                    
                
            </div>
        </div>
        <div class="form-group row mx-auto">
            <label for="pwd2" class="col-sm-3 form-control-lg my-2">Password Again</label>
            <div class="col-sm-6">
                <input type="password"  maxlength="18" class="form-control form-control-lg" id="pwd2" name="password2" placeholder="Password 8-18 characters: 1 Upper, Lower, Number & Special" required>
                             
                
            </div>
        </div>
        <!-- Email 5-25 chars-->
        <div class="form-group row mx-auto">
            <label for="e-mail" class="col-sm-3 form-control-lg my-2">E-Mail</label>
            <div class="col-sm-6">
                <input type="email" maxlength="50" class="form-control form-control-lg" id="e-mail" name="email" value="<?php echo $email; ?>" placeholder="Email@example.com" required>
                
            </div>
        </div>

        <!-- max 50 chars-->
        <div class="form-group row mx-auto">
            <label for="fname" class="col-sm-3 form-control-lg my-2">First Name</label>
            <div class="col-sm-6">
                <input type="text" maxlength="50" class="form-control form-control-lg" id="fname" name="f_name" value="<?php echo $f_name; ?>" placeholder="First Name" required>
                
            </div>
        </div>
        
        <div class="form-group row mx-auto">
            <label for="lname" class="col-sm-3 form-control-lg my-2">Last Name</label>
            <div class="col-sm-6">
                <input type="text" maxlength="50" class="form-control form-control-lg" id="lname" name="l_name" value="<?php echo $l_name; ?>" placeholder="Last Name" required>
                
            </div>            
        </div>
        
        
        <!-- max 5 chars-->
        <div class="form-group row mx-auto">
            <label for="zip-code" class="col-sm-3 form-control-lg my-2">Zip Code</label>
            <div class="col-sm-6">
                <input type="text" maxlength="5" class="form-control form-control-lg" id="zip-code" name="zip_code" value="<?php echo $zipcode; ?>" placeholder="Zip Code" required>
                
            </div>            
        </div> 
        <p class="errors">
        <?php
        include('../includes/errors.php');
        ?>
        </p>

        <p>
            Already a user? <a href="login.php">Sign in</a>
        </p>

        <button name="reg_user" type="submit" class="btn btn-primary">Submit</button>       

    </fieldset>

</form>
<?php
include_once('../includes/Footer.php');
?>