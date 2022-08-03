<?php

class Signup extends Dbh
{
    protected function setUser($username, $password, $email)
    {
        $stmt = $this->dbConnect()->prepare("INSERT INTO `lva`.`user`(`username`,`password`,`email`,`typeAccount`) VALUES (?, ?, ?, 1)");

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $hashed, $email)))
        {
            $stmt = null;
            header("location: ../signup.php?error=stmtfaileduseradd");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($username, $email)
    {
        $stmt = $this->dbConnect()->prepare("SELECT `username` FROM `lva`.`user` WHERE `username` = ? OR `email` = ?");
        
        if(!$stmt->execute(array($username, $email)))
        {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailedusercheck");
            exit();
        }

        $wynik = true;

        if($stmt->rowCount() > 0 )
        {
            $wynik = false;
        }

        return $wynik;
    }   
}