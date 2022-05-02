<?php

Class Database
{
    private $dbtype;
    private $host;
    private $port;
    private $dbname;
    private $user;
    private $pass;
    public $pdo;

    public function __construct($dbtype, $host, $port, $dbname, $user, $pass)
    {
        $this->dbtype = $dbtype;
        $this->host = $host;
        $this->port = $port;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function connectDatabase()
    {
        try{
            $this->pdo = new PDO($this->dbtype .':host=' . 
            $this->host .';port='. $this->port. ';dbname='. 
            $this->dbname, $this->user, $this->pass);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected Sucessfully\n";

        } catch(PDOException $e){

            echo 'Connection Failed' . $e->getMessage();

        }

    }

}


