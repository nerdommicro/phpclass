<?php
require_once "Database.php";


class UserDB
{
    
    public static function getUserByUserID($val)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "SELECT * FROM users WHERE UserId = '$val' LIMIT 1";
            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        
        }
        return false;
    }    

    public static function getAllUsers()
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "SELECT * FROM users";
            return $dbConn->query($query);
        }
        return false;

    }



    public static function DeleteUser($val)
    {

        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "DELETE from users
                        WHERE UserNo = '$val'";
            return $dbConn->query($query) === TRUE;
        }
        return false;
    }
    public static function AddUser($userid, $password,$f_name, $l_name, $email, $zip)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "INSERT INTO users (UserId, Password, FirstName, 
            LastName, EMail, ZipCode)
                        VALUES ('$userid', '$password', '$f_name', 
                        '$l_name', '$email', '$zip')";
            return $dbConn->query($query) === TRUE;
        }
        return false;
    }
    
    public static function UpdateUser($id, $userid, $password, 
    $f_name, $l_name, $email, $zip)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "UPDATE users SET
                        UserId='$userid',
                        Password='$password',
                        FirstName='$f_name',
                        LastName='$l_name',                        
                        EMail='$email',
                        ZipCode='$zip'
                        WHERE 
                        UserNo = '$id'";
            return $dbConn->query($query) === TRUE;
        }
        return false;
    }





















}
