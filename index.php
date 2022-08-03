<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styl1.css">


    <title>LVA - Music</title>
</head>
<body>
    <form action ="includ/Login.inc.php" method="POST">
        <h2>Logowanie</h2>
        <input type="text" name="username" placeholder="Nazwa użytkownika">
        <input type="password" name="password" placeholder="Hasło">
        <button type="submit" name='submit'>Zaloguj</button>
        <button type="submit" formaction="signup.php">Zarejestruj</button>
        <div id="error">
            <?php
                if(isset($_GET['error']))
                {
                    include "class/errorcontr.class.php";
                    $error = new ErrorContr;

                    echo $error->showError($_GET['error']);
                }
            ?>
        </div>
    </form>
</body>
</html>