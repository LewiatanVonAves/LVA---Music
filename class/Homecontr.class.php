<?php

class homeContr extends home
{
    private $userid;
    private $username;

    public function __construct($userid, $username)
    {
        $this->userid = $userid;
        $this->username = $username;
    }

    public function Playlist()
    {
        if($this->emptyInput() == false)
        {
            //header("location: home.php?error=emptyinput");
            exit();
        }
        if($this->isNumber() == false)
        {
            //header("location: home.php?error=invaliduserid");
            exit();
        }
        return $this->showPlaylist($this->userid, $this->username);
    }

    private function emptyInput()
    {
        $wynik = true;

        if(empty($this->userid) || empty($this->username))
        {
            $wynik = false;
        }
        return $wynik;
    }

    private function isNumber()
    {
        $wynik = true;

        if(!is_numeric($this->userid)){
            $wynik = false;
        }
        return $wynik;
    }
}