<?php

class ErrorContr 
{
    private $texterror;
    private $error;

    public function showError($error)
    {
        $this->error = $error;

        switch($this->error)
        {
            case "stmtfaileduseradd":
                $this->texterror = "Błąd dodawania użytkownika.";
                break;
            case "stmtfailedusercheck":
                $this->texterror = "Użytkownik o podanej nazwie już istnieje.";
                break;
            case "stmtfailedusercheck2":
                $this->texterror = "Brak użytkownika o podanej nazwie.";
                break;
            case "stmtfailed":
                $this->texterror = "Coś poszło nie tak.";
                break;
            case "emptyinput":
                $this->texterror = "Wypełnij wszystkie pola.";
                break;
            case "invalidname":
                $this->texterror = "Niedozwolone znaki w nazwie użytkownika.";
                break;
            case "invalidemail":
                $this->texterror = "Niepoprawny email.";
                break;
            case "notsamepassword":
                $this->texterror = "Podane hasła różnią się.";
                break;
            case "usernameisisset":
                $this->texterror = "Użytkownik o podanej nazwie już istnieje.";
                break;
            default:
                $this->texterror = "";
                break;
        }

        return $this->texterror;
    }
}