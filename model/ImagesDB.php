<?php
require_once "Database.php";

class ImagesDB
{

    public static function getImageByImageNo($val)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "SELECT * FROM Images WHERE ImageID = '$val' LIMIT 1";
            $result = $dbConn->query($query);
            return $result->fetch_assoc();

        }
        return false;
    }
    public static function getImageByNo($val)
    {
        return self::getImageByImageNo($val);
    }


    public static function getAllImages()
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "SELECT * FROM Images";
            return $dbConn->query($query);
        }
        return false;

    }

    public static function getImageBySku($val)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "SELECT * FROM Images WHERE ImageSKU = '$val' LIMIT 1";
            $result = $dbConn->query($query);
            return $result->fetch_assoc();

        }
        return false;
    }

    public static function DeleteImage($val)
    {

        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "DELETE from Images
                        WHERE ImageID = '$val'";
            return $dbConn->query($query) === TRUE;
        }
        return false;
    }

    public static function AddImage($sku, $title, $imageurl, $tags)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "INSERT INTO Images (ImageSKU, ImageTitle, ImageURL,ImageTags)
                        VALUES ('$sku','$title', '$imageurl','$tags')";
            return $dbConn->query($query) === TRUE;
        }
        return false;
    }


    public static function UpdateImage($id, $sku, $title, $imageurl, $tags)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "UPDATE Images SET
                        ImageSKU='$sku', 
                            ImageTitle='$title', 
                            ImageURL='$imageurl', 
                            ImageTags='$tags'                            
                        WHERE 
                        ImageID = '$id'";
            return $dbConn->query($query) === TRUE;
        }
        return false;
    }


}
