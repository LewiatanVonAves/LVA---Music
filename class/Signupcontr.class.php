<?php

class SignupContr extends Signup {

    private $username;
    private $email;
    private $password;
    private $passrepeat;

    public function __construct($username, $email, $password, $passrepeat)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->passrepeat = $passrepeat;
    }

    public function signupUser()
    {
        if($this->emptyInput() == false)
        {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if($this->invalidName() == false)
        {
            header("location: ../signup.php?error=invalidname");
            exit();
        }
        if($this->invalidEmail() == false)
        {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if($this->passCheck() == false)
        {
            header("location: ../signup.php?error=notsamepassword");
            exit();
        }
        if($this->usernameCheck() == false)
        {
            header("location: ../signup.php?error=usernameisisset");
            exit();
        }

        $this->setUser($this->username,$this->password,$this->email);
    }

    private function emptyInput()
    {
        $wynik = true;

        if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->passrepeat))
        {
            $wynik = false;
        }
        return $wynik;
    }

    private function invalidName()
    {
        $wynik = true;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username))
        {
            $wynik = false;
        }
        return $wynik;
    }

    private function invalidEmail()
    {
        $wynik = true;

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $wynik = false;
        }
        return $wynik;
    }

    private function passCheck()
    {
        $wynik = true;

        if($this->password !== $this->passrepeat){
            $wynik = false;
        }
        return $wynik;
    }

    private function usernameCheck()
    {
        $wynik = true;
        if(!$this->checkUser($this->username, $this->email))
        {
            $wynik = false;
        }
        return $wynik;
    }
}