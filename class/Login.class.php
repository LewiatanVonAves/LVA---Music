<?php

class Login extends Dbh
{
    protected function getUser($username, $password)
    {
        $stmt = $this->dbConnect()->prepare("SELECT `password` FROM `lva`.`user` where `username` = ? or `email` = ?");

        if(!$stmt->execute(array($username, $password)))
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedusercheck2");
            exit();
        }

        $passwordHashed = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $passwordcheck = password_verify($password, $passwordHashed[0]["password"]);

        if($passwordcheck == false)
        {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }

        if($passwordcheck = true)
        {
            $stmt = $this->dbConnect()->prepare("SELECT `id`, `username`, `email` `typeAccount`FROM `lva`.`user` where `email` = ? or `username` = ? AND `password` = ?");

            if(!$stmt->execute(array($username, $username, $password)))
            {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if(!$stmt->rowCount() == 0)
            {
                $stmt = null;
                header("location: ../index.php?error=stmtfailedcheckuser");
                exit();
            }

            $user = $stmt->fetchALL(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['userid'] = $user[0]["id"];
            $_SESSION['username'] = $user[0]["username"];
            $_SESSION['typeAccount'] = $user[0]["typeAccount"];
        }

        $stmt = null;
    }
}