<?php

class LoginContr extends Login 
{

    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser()
    {
        if($this->emptyInput() == false)
        {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->username, $this->password);
    }

    private function emptyInput()
    {
        $wynik = true;

        if(empty($this->username) || empty($this->password))
        {
            $wynik = false;
        }
        return $wynik;
    }

}