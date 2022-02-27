<?php
require_once "Database.php";


class ProductDB
{

    public static function getProductByProductNo($val)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "SELECT * FROM Products WHERE ProductNo = '$val' LIMIT 1";
            $result = $dbConn->query($query);
            return $result->fetch_assoc();

        }
        return false;
    }

    public static function getAllProducts()
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "SELECT * FROM Products";
            return $dbConn->query($query);
        }
        return false;

    }

    public static function getProductBySku($val)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "SELECT * FROM Products WHERE ProductSKU = '$val' LIMIT 1";
            $result = $dbConn->query($query);
            return $result->fetch_assoc();

        }
        return false;
    }

    public static function DeleteProduct($val)
    {

        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "DELETE from Products
                        WHERE ProductNo = '$val'";
            return $dbConn->query($query) === TRUE;
        }
        return false;
    }

    public static function AddProduct($sku, $title, $imageurl, $tags, $price, $d, $q)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "INSERT INTO Products (ProductSKU, ProductTitle, ProductImageURL,ProductTags, ProductPrice, ProductDescription, ProductQuantity)
                        VALUES ('$sku','$title', '$imageurl','$tags', '$price', '$d', '$q')";
            return $dbConn->query($query) === TRUE;
        }
        return false;
    }



    public static function UpdateProduct($id, $sku, $title, $imageurl, $tags, $price, $d, $q)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();
        if ($dbConn) {
            $query = "UPDATE Products SET
                        ProductSKU='$sku', 
                            ProductTitle='$title', 
                            ProductImageURL='$imageurl', ,
                            ProductTags='$tags', , 
                            ProductPrice='$price', , 
                            ProductDescription='$d', , 
                            ProductQuantity='$q'
                        WHERE 
                        ProductNo = '$id'";
            return $dbConn->query($query) === TRUE;
        }
        return false;
    }





















}
