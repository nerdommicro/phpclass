<?php

class Database
{
    
    private $dbname = 'cablesws_ftpweb';
    private $host = 'localhost';
    private $username = 'cablesws_ftpweb';
    private $password = '6TusdNdKdUoACkHm';
    private $conn;
    private $conn_error = '';


    public function __construct()
    {
//        mysqli_report(MYSQLI_REPORT_STRICT);

        $this->connect();
       
        if ($this->conn === false) {            
            $this->connect();
            if ($this->conn === false) {
                $this->conn_error = "Failed to connect to DB: " . mysqli_connect_error();
            }
        }
    }
    private function connect()
    {
        $this->conn = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->dbname
        );
    }

    public function __destruct()
    {
        mysqli_close($this->conn);
    }

    public function getDbConn()
    {
        return $this->conn;
    }

    public function getDbError()
    {
        return $this->conn_error;
    }

    public function getDbName()
    {
        return $this->dbname;
    }

    public function getDbUser()
    {
        return $this->username;
    }

    public function getDbUserPw()
    {
        return $this->password;
    }
}
