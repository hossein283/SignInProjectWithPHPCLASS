<?php

namespace database\database;
class database
{
    protected $pdo;
    private $options;
    private $dbname;
    private $dbUser;
    private $dbPass;

    public function __construct($name, $username, $password)
    {
        $this->dbname = $name;
        $this->dbUser = $username;
        $this->dbPass = $password;
        $this->options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING];
        $this->pdo = new \PDO('mysql:host=localhost;dbname=' . $this->dbname . ';', $this->dbUser, $this->dbPass, $this->options);
    }
}