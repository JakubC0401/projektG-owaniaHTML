<?php
    session_start();
    if(isset($_POST['email']))
    {
        $wszystko_OK=true;

        //sprawdzenie nickname'a

        $nick=$_POST['nick'];

        //sprawdzenie długości nickname'a

        if((strlen($nick)<3) || (strlen($nick)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_nick']="Nickname musi posiadać od 3 do 20 znaków!";
        }
        if(ctype_alnum($nick)==false)
        {
            $wszystko_OK=false;
            $_SESSION['e_nick']="Nickname może składać się tylko z liter i cyfr (bez polskich znaków)";
        }

        //sprawdzam email
        $email=$_POST['email'];
        $emailB= filter_var($email,FILTER_SANITIZE_EMAIL);

        if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false)||($emailB!=$email)){
            $wszystko_OK=false;
            $_SESSION['e_email']="Podaj poprawny adres email!";
        }


        //sprawdzam hasło
        $haslo1=$_POST['haslo1'];
        $haslo2=$_POST['haslo2'];

        if((strlen($haslo1)<8)||(strlen($haslo1)>20)){
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Hasło musi mieć od od 8 do 20 znaków";
        }
        if($haslo1 != $haslo2){
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Hasła nie są takie same";
        }

        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
        
        //sprawdzam regulamin
        if(!isset($_POST['regulamin'])){
            $wszystko_OK=false;
            $_SESSION['e_regulamin']="Nie akceptowałeś regulaminu";
        }
        //sprawdzam recaptcha
        $sekret="6LecM_UZAAAAAPeiQ4Iiq-S6SC1ymfJ0L3Fmk-PY";

        $sprawdz = file_get_contents('https://google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

        $odpowiedz=json_decode($sprawdz);

        if($odpowiedz->success==false){
            $wszystko_OK=false;
            $_SESSION['e_recaptcha']="Nie przeszedłeś re-captcha";
        }


        //Sprawdzanie czy nie ma już kogos takiego w bazie danych

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT); 
        try
        {
            $polaczenie= new mysqli($host,$db_user,$db_password,$db_name);
            if($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                //czy mail jest w bazie
                $rezultat=$polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");

                if(!$rezultat)
                {
                    throw new Exception($polaczenie->error);
                }
                $ile_takich_maili=$rezultat->num_rows;
                if($ile_takich_maili>0)
                {
                    $wszystko_OK=false;
                    $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
                }
                
                //sprawdzam czy nick jest w bazie

                $rezultat=$polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");

                if(!$rezultat)
                {
                    throw new Exception($polaczenie->error);
                }
                $ile_takich_nickow=$rezultat->num_rows;
                if($ile_takich_nickow>0)
                {
                    $wszystko_OK=false;
                    $_SESSION['e_nick']="Istnieje już konto przypisane do tego nicku!";
                }

                if($wszystko_OK==true){
                    //testy zaliczone, user dodany do bazy danych 
                    if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL,'$nick','$haslo_hash','$email',100,
                    100,100,now()+INTERVAL 14 DAY )"))
                    {
                        $_SESSION['udana rejestracja']=true;
                        header('Location: witamy.php');
                    }
                    else
                    {
                        throw new Exception($polaczenie->error);
                    }
                }
                $polaczenie->close();

            }
        }
        catch(Exception $e)
        {
            echo "błąd serwera, przepraszamy za niedogodności, zapraszamy później";
            //echo "<br/> informacja deweloperska".$e;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Osadnicy-PANEL REJESTRACJI</title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style>
        .error
        {
            color:red;
        }
        </style>
    </head>
    <body>
       <form method="POST">
       <h1> REJESTRACJA</h1>

       </br>
            Nickname </br>
            <input type="text" name="nick">
            </br>
            <?php
                if(isset($_SESSION['e_nick'])){
                    echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                    unset($_SESSION['e_nick']);
                }
            ?>

            Email </br>
            <input type="text" name="email">
            </br>
            <?php
                if(isset($_SESSION['e_email'])){
                    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                    unset($_SESSION['e_email']);
                }
            ?>

            Hasło </br>
            <input type="password" name="haslo1">
            </br>
            <?php
                if(isset($_SESSION['e_haslo'])){
                    echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                    unset($_SESSION['e_haslo']);
                }
            ?>

            Powtórz hasło </br>
            <input type="password" name="haslo2">
            </br>
            </br>

            <label>
            Akceptuje regulamin
            <input type="checkbox" name="regulamin">
            <?php
                if(isset($_SESSION['e_regulamin'])){
                    echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                    unset($_SESSION['e_regulamin']);
                }
            ?>
            </label>
            </br>
            <div class="g-recaptcha" data-sitekey="6LecM_UZAAAAAFFdQ2cjZCHpAaP_tHllL4f3lx5y"></div>
            <?php
                if(isset($_SESSION['e_recaptcha'])){
                    echo '<div class="error">'.$_SESSION['e_recaptcha'].'</div>';
                    unset($_SESSION['e_recaptcha']);
                }
            ?>

            </br>
            <input type="submit" value="zarejestruj się">
            

       </form>    
    </body>
</html>