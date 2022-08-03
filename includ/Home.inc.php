<?php
session_start();
if(isset($_SESSION["userid"]))
{
    include "../class/dbh.class.php";
    include "../class/Home.class.php";
    include "../class/Homecontr.class.php";

    $home = new homeContr($_SESSION["userid"], $_SESSION["username"]);
    $home->Playlist();

    header("location: ../home.php?error=none");
}

