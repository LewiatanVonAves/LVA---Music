<?php
echo "cos";
if(isset($_POST['submit']))
{
    echo "cos";
    $username = $_POST['username'];
    $password = $_POST['password'];

    include "../class/dbh.class.php";
    include "../class/Login.class.php";
    include "../class/Logincontr.class.php";

    $login = new LoginContr($username, $password);
    
    $login->loginUser();


    header("location: ../home.php?error=none");
}
