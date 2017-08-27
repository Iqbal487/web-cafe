<?php
namespace App\BITM\SEIPXXXX\Model;

use PDO;
use PDOException;


class Database{
   public $conn;


    public $username="root";
    public $password="";
    
    public function __construct()
    {
        try {

            # MySQL with PDO_MYSQL
            $this->conn = new PDO("mysql:host=localhost;dbname=user-management", $this->username, $this->password);

        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

