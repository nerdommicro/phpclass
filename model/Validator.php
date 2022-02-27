<?php
namespace Validator;

// required 
function isValidStringMaxChars($val, $minlen)
{
    if ($val === "" || $val === 0 || is_null($val)) {
        return "Required.";
    }

    if (strlen($val) < $minlen) {
        return "Invalid format: Minimum " . $minlen . " characters.";
    }

    return "";
}

function isValidFirstName($val)
{
    return isValidStringMaxChars($val, 1);
}

// required
function isValidLastName($val)
{
    return isValidStringMaxChars($val, 1);
}


// required
function isValidZip($val)
{
    if ($val === "" || $val === 0 || is_null($val)) {
        return "Required.";
    }
    if (is_numeric($val) && strlen($val) === 5) {
        return "";
    }
    return "Zip must be 5 numbers.";
}


function isValidQuantity($val)
{
    $errors2 = "";
    if ($val === "" || $val === 0 || is_null($val)) {
        $errors2 = ($errors2 . "You must enter a quantity. ");
    }

    if (!preg_match('/[0-9]/', $val)) {
        $errors2 = $errors2 . "Price must be a number. ";
    }
   
    return $errors2;
}




// required
function isValidUserId($val): string
{
    $msg = "";
    if ($val === "" || $val === 0 || is_null($val))
    {
        $msg = "You must enter a user id. ";
    }   
    elseif (!preg_match('/[a-zA-Z0-9-]/', $val))
    {
        $msg = "Password must have letters, numbers, or dashes only. ";
    }

    return $msg;
}


//required
function isValidEMail($val): string
{
    if ($val === "" || $val === 0 || is_null($val))
    {
        return "Required.";
    }
    if (!filter_var($val, FILTER_VALIDATE_EMAIL))
    {
        return "Invalid email. Format: xxx@xxx.com";
    }
    return "";
}

function isValidPrice($val)
{
    $errors2 = "";
    if ($val === "" || $val === 0 || is_null($val))
    {
        $errors2 = ($errors2 . "You must enter a price. ");
    }

    if (!preg_match('/[0-9.]/', $val))
    {
        $errors2 = $errors2 . "Price must be a number and/or decimal. ";
    }

    return $errors2;
}


function isValidPassword($val): string
{
    $errors2 = "";
    if ($val === "" || $val === 0 || is_null($val))    {
        $errors2 = ($errors2 . "You must enter a password.");
    }
    if (strlen($val < 8 || strlen($val)) > 18)    {
        $errors2 = $errors2 . "Must be 8 to 18 characters. ";
    }
    if (!preg_match('/[a-z]/', $val))    {
        $errors2 = $errors2 . "Password must have 1 lowercase. ";
    }
    if (!preg_match('/[A-Z]/', $val))    {
        $errors2 = $errors2 . "Password must have 1 uppercase. ";
    }
    if (!preg_match('/[0-9]/', $val))    {
        $errors2 = $errors2 . "Password must have 1 number. ";
    }
    if (!preg_match('/[!@#$%^&*()]/', $val))    {
        $errors2 = ($errors2 . "Password must have one special !@#$%^&*()");
    }
    return $errors2;
}
