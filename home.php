<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Home</title>
</head>
<body>
    <div id="main">
    <div id="banner">
        <h2> LVA - Music</h2>
        <form>
        <button type="submit" name='submit'>Wyloguj</button>
        </form>
    </div>
    <div id="playlist">
    <?php 
        echo $_SESSION["userid"];
        if(!isset($_SESSION['userid']))
        {
            include "class/dbh.class.php";
            include "class/Home.class.php";
            include "class/Homecontr.class.php";

            //??
            $home = new homeContr(4, "Lewiatan");
            echo $home->Playlist();
        }
        else
        {
            echo "Coś poszło nie tak";
        }
    ?>
    </div>
    </div>
</body>
</html>