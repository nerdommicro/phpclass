<?php
require_once "UserClass.php";
require_once "../model/UserDB.php";


class UserController
{
    private static function rowToUser($row)
    {
        // UserNo is primary key.
        // UserId is the login name (not the email)
        $user = new UserClass(
            $row['UserId'],
            $row['Password'],
            $row['FirstName'],
            $row['LastName'],
            $row['EMail'],
            $row['ZipCode'],
            $row['UserNo']
            );        
        return $user;
    }


    public static function validUser($userid, $password)
    {
       
        $queryRes = UserDB::getUserByUserID($userid);

        if ($queryRes) {
            $user = self::rowToUser($queryRes);

            $hash = $user->getPassword();

            $verify = password_verify($password, $hash);
            if ($verify){
                return true;
            }
        }
        return false;

    }
    public static function isUser($userid)
    {
        $queryRes = UserDB::getUserByUserID($userid);

        if ($queryRes) {
            return true;            
        }
        return false;
    }

    public static function getUser($userid)
    {
        $queryRes = UserDB::getUserByUserID($userid);

        if ($queryRes) {

            return self::rowToUser($queryRes);
        }
        return false;
    }


    public static function getAllUsers()
    {
        $queryRes = UserDB::getAllUsers();

        if ($queryRes) {
            $user = array();
            foreach ($queryRes as $row) {
                $user[] = self::rowToUser($row);
            }
            return $user;
        }
        return false;
    }


    public static function DeleteUser($val)
    {
        return UserDB::DeleteUser($val);
    }

    public static function AddUser($user)
    {
        return UserDB::AddUser(
            $user->getUserId(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEMail(),
            $user->getZipCode()
        );
    }
    public static function UpdateUser($user)
    {
        return UserDB::UpdateUser(
            $user->getUserNo(),
            $user->getUserId(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEMail(),
            $user->getZipCode()
        );
    }




}
