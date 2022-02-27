<?php
require_once "../utilities/Security.php";
Security::checkHTTPS();
require_once "../model/Server.php";
include_once("../includes/Header.php") 
?>
<h1>Login</h1>


 <form action="login.php" method="POST">

        <fieldset>
            <div class="form-group col-md-4 mx-auto">
                <label for="u-id" class="form-label form-control-lg mt-2">User ID</label>
                <input type="text" class="form-control mb-3" id="u-id" name="username" maxlength="25" placeholder="User ID" />
            </div>
            <div class="form-group col-md-4 mx-auto">
                <label for="pwd" class="form-label form-control-lg mt-1">Password</label>
                <input type="password" class="form-control mb-3" id="pwd" name="password" maxlength="18" placeholder="Password" />
            </div>
            <div class="form-group col-md-4 mx-auto">
                <button name="login_user" type="submit" class="btn btn-primary my-2 my-sm-0 mx-1">Sign In</button>
            </div>
        </fieldset>
        <p class="errors">
        <?php
        include('../includes/errors.php');
        ?>
        </p>
        <p>
            New user? <a href="register.php">Create Account</a>
        </p>
        
    </form>
<?php
include_once('../includes/Footer.php');
