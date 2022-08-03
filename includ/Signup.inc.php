<?php

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passrepeat = $_POST['passrepeat'];

    include "../class/dbh.class.php";
    include "../class/Signup.class.php";
    include "../class/Signupcontr.class.php";

    $sigmuser = new SignupContr($username, $email, $password, $passrepeat);
    $sigmuser->signupUser();

    header("location: ../index.php?error=none");
}

