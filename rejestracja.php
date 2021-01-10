<?php        
    //$conn = mysqli_connect("userdb1", "1202557_i5E183", "zG1MPHPlyigmJ8", '1202557_i5E183');
    $conn = mysqli_connect("localhost", "root", "", 'user');
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    

    if (isset($_POST['sumbit']))
    {    
        $login = $_POST['login'];
        $haslo1 = $_POST['password'];
        $haslo2 = $_POST['repeatPassword'];

        $sql = "SELECT login FROM user WHERE login = '" .$login. "';";
        $x = mysqli_num_rows(mysqli_query($conn, $sql));
        if ( $x == 0)
        {
            if ($haslo1 == $haslo2)
            {
                mysqli_query($conn,"INSERT INTO `user` (`login`, `password`)
                    VALUES ('".$login."', '".md5($haslo1)."');");                
                echo "<h2>Konto zostało stworzone!</h2>";
                header("Location: index.html");
            }
            else echo "<h2>Hasła nie są takie same!</h2>";
        }
        else echo "</h2>Podany login jest już zajęty.</h2>";
    }
    else
    {
        echo "<h2>Uzupełnij wymagane dane!</h2>";
    }

?>