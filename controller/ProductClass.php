<?php

class ProductClass
{
	private $No; // primary key
	private $SKU;
	private $Title;
	private $Price;
	private $ImageURL;
	private $Tags;
	private $Description;
	private $Quantity;
        

	public function __construct($sku, $title, $price, $image, $tags, $desc, $qty, $no=NULL)
	{
		$this->SKU = $sku;
		$this->Title = $title;
		$this->Price = $price;
		$this->ImageURL = $image;
		$this->Tags = $tags;
		$this->Description = $desc;
		$this->Quantity = $qty;
		$this->No = $no;
	}

	
	function getNo()
	{
		return $this->No;
	}
    function getProductNo()
    {
        return $this->No;
    }
	
	function setNo($val): self
	{
		$this->No = $val;
		return $this;
	}
	
	function getSKU()
	{
		return $this->SKU;
	}

	
	function setSKU($val): self
	{
		$this->SKU = $val;
		return $this;
	}
	
	function getTitle()
	{
		return $this->Title;
	}

	
	function setTitle($val): self
	{
		$this->Title = $val;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getPrice()
	{
		return $this->Price;
	}

	
	function setPrice($val): self
	{
		$this->Price = $val;
		return $this;
	}
	
	function getImageURL()
	{
		return $this->ImageURL;
	}

	
	function setImageURL($val): self
	{
		$this->ImageURL = $val;
		return $this;
	}
	
	function getTags()
	{
		return $this->Tags;
	}

	
	function setTags($t): self
	{
		$this->Tags = $t;
		return $this;
	}
	
	function getDescription()
	{
		return $this->Description;
	}

	
	function setDescription($d): self
	{
		$this->Description = $d;
		return $this;
	}
	
	function getQuantity()
	{
		return $this->Quantity;
	}

	
	function setQuantity($val): self
	{
		$this->Quantity = $val;
		return $this;
	}
}
