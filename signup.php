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
    <form action ="includ/Signup.inc.php" method="POST">
        <h2>Zarejestruj</h2>
        <input type="text" name="username" placeholder="Nazwa użytkownika">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Hasło">
        <input type="password" name="passrepeat" placeholder="Potwierdź hasło">
        <button type="submit" name="submit">Zarejestruj</button>
        <button type="submit" formaction="index.php">Zaloguj</button>

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