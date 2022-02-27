<?php
require_once "ProductClass.php";
require_once "../model/ProductDB.php";

class ProductController
{
    private static function rowToProduct($row)
    {
        // ProductNo is primary key.

        $Product = new ProductClass(
            $row['ProductSKU'],
            $row['ProductTitle'],
            $row['ProductPrice'],
            $row['ProductImageURL'],
            $row['Tags'],
            $row['ProductDescription'],
            $row['ProductQuantity'],
            $row['ProductNo']
        );
        return $Product;
    }
    
    public static function isSKU($sku)
    {
        $queryRes = ProductDB::getProductBySku($sku);

        if ($queryRes) {
            return true;
        }
        return false;
    }

    public static function isProduct($Productid)
    {
        $queryRes = ProductDB::getProductByProductNo($Productid);

        if ($queryRes) {
            return true;
        }
        return false;
    }
    public static function getProductByNo($val)
    {
        $queryRes = ProductDB::getProductByProductNo($val);

        if ($queryRes) {
            return true;
        }
        return false;
    }
    public static function getProduct($Productid)
    {
        $queryRes = ProductDB::getProductByProductNo($Productid);

        if ($queryRes) {

            return self::rowToProduct($queryRes);
        }
        return false;
    }


    public static function getAllProducts()
    {
        $queryRes = ProductDB::getAllProducts();

        if ($queryRes) {
            $Product = array();
            foreach ($queryRes as $row) {
                $Product[] = self::rowToProduct($row);
            }
            return $Product;
        }
        return false;
    }
     public static function getAllItems()
    {
        return self::getAllProducts();
    }


    public static function DeleteProduct($val)
    {
        return ProductDB::DeleteProduct($val);
    }

    public static function AddProduct($Product)
    {
        return ProductDB::AddProduct(
            $Product->getSKU(),
            $Product->getTitle(),
            $Product->getImageURL(),
            $Product->getTags(),
            $Product->getPrice(),
            $Product->getDescription(),
            $Product->getQuantity()
        );
    }
    public static function UpdateProduct($Product)
    {
        return ProductDB::UpdateProduct(
            $Product->getProductNo(),
            $Product->getSKU(),
            $Product->getTitle(),
            $Product->getImageURL(),
            $Product->getTags(),
            $Product->getPrice(),
            $Product->getDescription(),
            $Product->getQuantity()
        );
    }




}
