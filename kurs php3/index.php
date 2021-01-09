<?php
    session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Osadnicy gra przeglądarkowa</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body >
        Tylko martwi ujrzeli koniec wojny ~Platon
        <br/><br/>
        <a href="rejestracja.php">Darmowa rejestracja</a>
        <br/><br/>
        <form action="zaloguj.php" method="POST">
            <p>Login:</p><br/><input type="text" name="login">
            <br/>
            <p>Hasło:</p><br/><input type="password" name="pw">
            <br/>
            <br/>
            <input type="submit" value="zaloguj">
        </form>
        <?php
            if(isset($_SESSION['blad'])){
                echo $_SESSION['blad'];
            }
            
        ?>
    </body>
</html>