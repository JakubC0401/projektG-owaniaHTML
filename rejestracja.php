<?php
    $conn = mysql_connect("userdb1","1202557_i5E183","zG1MPHPlyigmJ8");
    mysql_select_db("1202557_i5E183");

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    function filter($zmienna)
    {
        if(get_magic_quotes_gpc())
            $zmienna = stripslashes($zmienna); // usuwamy slashe
        
        // usuwamy spacje, tagi html oraz niebezpieczne znaki
        return mysql_real_escape_string(htmlspecialchars(trim($zmienna)));
    }
    
    if (isset($_POST['rejestruj']))
    {
        $login = filter($_POST['login']);
        $haslo1 = filter($_POST['pw']);
        $haslo2 = filter($_POST['pw2']);
        $email = filter($_POST['email']);
        $ip = filter($_SERVER['REMOTE_ADDR']);
        
        // sprawdzamy czy login nie jest już w bazie
        if (mysql_num_rows(mysql_query("SELECT login FROM user WHERE login = '".$login."';")) == 0)
        {
            if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
            {
                mysql_query("INSERT INTO `user` (`login`, `haslo`)
                    VALUES ('".$login."', '".md5($haslo1)."');");
                
                echo "Konto zostało utworzone!";
            }
            else echo "Hasła nie są takie same";
        }
        else echo "Podany login jest już zajęty.";
?>