<?php
    session_start();

    if((!isset($_SESSION['udanarejestracja'])))
    {
        header('Location:index.php');
        exit();
    }
    else
    {
        unset($_SESSION['udanarejestracja']);
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Witamy</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        Dziękujemy za rejestracje, zapraszamy do zalogowania się!
        <br><br>
        <a href="index.php">Zaloguj się na swoje konto, CLICK</a>
        <script src="" async defer></script>
    </body>
</html>