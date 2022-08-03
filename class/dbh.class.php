<?php

class Dbh 
{
    private $dbhost = "localhost";
    private $dbname = "lva";
    private $dbchar = "UTF8";
    private $dbuser = "root";
    private $dbpass = "";
    
    protected function dbConnect()
    {
        try 
        {
            $pdo = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . ";charset=" . $this->dbchar, $this->dbuser, $this->dbpass);
            // $pdo->getFetchMode(PDO::Fetch_ASSOC);
        }
        catch(PDOException $e)
        {
            return false;
        }

        return $pdo;
    }

}