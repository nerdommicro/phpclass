<?php

class UserClass
{
    private $UserNo; // primary key
    private $UserId;
    private $Password;
    private $FirstName;
    private $LastName;
    private $EMail;
    private $ZipCode;

    
    
    public function __construct($userid, $password, $f_name,
        $l_name, $email, $zip, $userno = NULL)
    {
        
        $this->UserId = $userid;
        $this->Password = $password;
        $this->FirstName = $f_name;
        $this->LastName = $l_name;
        $this->EMail = $email;
        $this->ZipCode = $zip;
        $this->UserNo = $userno;
    }

    public function setUserNo($val)
    {
        $this->UserNo = $val;
    }

    public function setUserId($val)
    {
        $this->UserId = $val;
    }
    public function setPassword($val)
    {
        $this->Password = $val;
    }

    public function setFirstName($val)
    {
        $this->FirstName = $val;
    }

    public function setLastName($val)
    {
        $this->LastName = $val;
    }

    public function setEMail($val)
    {
        $this->EMail = $val;
    }
    public function setZipCode($val)
    {
        $this->ZipCode = $val;
    }

    

    public function getUserNo()
    {
        return $this->UserNo;
    }
    public function getUserId()
    {
        return $this->UserId;
    }
    public function getPassword()
    {
        return $this->Password;
    }
    public function getFirstName()
    {
        return $this->FirstName;
    }
    public function getLastName()
    {
        return $this->LastName;
    }

    public function getEMail()
    {
        return $this->EMail;
    }
    public function getZipCode()
    {
        return $this->ZipCode;
    }

    
}
