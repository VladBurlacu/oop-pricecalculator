<?php

declare(strict_types=1);

class Database
{

    //database host
    private $host;
    //database name
    private $db;
    //database user
    private $user;
    //database password
    private $pwd;
    //tells the database in which encoding we are sending the data and would like to get the data back
    private $charset = 'utf8mb4';

    public function __construct()
    {
        $this->host = $_ENV['MySQL_DB_HOST'];
        $this->db = $_ENV['MySQL_DB_NAME'];
        $this->user = $_ENV['MySQL_DB_USER_NAME'];
        $this->pwd = $_ENV['MySQL_DB_PASSWORD'];
    }

    public function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    public function getCustomers() : array{
        $sql = "SELECT id, firstname, lastname FROM customer ORDER BY lastname";
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetchAll();
        return $result;
    }

    public function getCustomerByID($id) {
        $sql = "SELECT group_id, fixed_discount, variable_discount FROM customer WHERE id=" . $id;
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch();
        return $result;
    }

    public function getProducts() : array {
        $sql = "SELECT id, name, CAST(price/100 AS DECIMAL (5, 2)) AS price FROM product";
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetchAll();
        return $result;
    }

    public function getProductByID($id) {
        $sql = "SELECT name, price FROM product WHERE id=" . $id;
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetch();
        return $result;
    }

    public function getGroupDiscountByID($groupID){
        $sql = "SELECT fixed_discount, variable_discount FROM customer_group WHERE id=" . $groupID;
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

}