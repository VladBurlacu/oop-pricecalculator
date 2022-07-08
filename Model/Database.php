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

}