<?php
    session_start();
    
    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>inGame</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
       <?php
            echo "<p>Witaj ".$_SESSION['user']. '! [<a href="logout.php">Wyloguj się</a>]';
            echo "<p><b>Drewno: </b>".$_SESSION['drewno'];
            echo "<p><b>Kamień: </b>".$_SESSION['kamien'];
            echo "<p><b>Zboże: </b>".$_SESSION['zboze'];
            echo "<p><b>Data wygaśnięcia premium: </b>".$_SESSION['dnipremium'];
            echo "<p><b>E-mail: </b>".$_SESSION['email'];

            echo "</br></br>";

            $dataczas = new DateTime('2017-01-01 09:30:15'); //aktualna data jest nadawna domyślnie
            echo "data i czas serwera: ".$dataczas->format('Y-m-d H:i:s')."<br>";

            $koniec = DateTime::createFromFormat('Y-m-d H:i:s',$_SESSION['dnipremium']);

            $roznica = $dataczas->diff($koniec); 

            if($dataczas<$koniec)
            {
                echo "Pozostało premium: ".$roznica->format('%d dni, %h godz, %i min, %s sek');
            }
            else
            {
                echo "Premium nieaktywne od: ".$roznica->format('%d dni, %h godz, %i min, %s sek');
            }
           
       ?>
    </body>
</html>