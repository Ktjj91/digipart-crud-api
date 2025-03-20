<?php

class Database
{
    private $pdo = null;
    private $host = "127.0.0.1";
    private  $dbname = "ecom";
    private $user = "root";
    private $pass = "root";

    public function connect()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connexion échouée : " . $e->getMessage());
        }

        return $this->pdo;


    }



}