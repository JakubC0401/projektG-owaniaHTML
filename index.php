<?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", 'users');
  //$conn = mysqli_connect("userdb1", "1202557_i5E183", "zG1MPHPlyigmJ8", '1202557_i5E183');
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST['zaloguj']))
    {
        $login = $_POST['login'];
        $haslo = $_POST['password'];
        
        
        // sprawdzamy czy login i hasło są dobre
        if (mysqli_num_rows(mysqli_query($conn,"SELECT login, password FROM user WHERE login = '".$login."' AND password = '".md5($haslo)."';")) > 0)
        {   
            $_SESSION['zalogowany'] = true;
            $_SESSION['login'] = $login;
            
            header("location:mainpage.php");
            // zalogowany
        }
        else
        {
          $_SESSION['e_zledane']="Podane dane są nieprawidłowe!";
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="backgroundColor">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    <div class="wrapper">
      <!--header-->
      <div class="test">
        <header class="siteLogo"> 
          <img src="Pagelogo.png" width="50px" height="50px"> 
          <a href="index.php" style="text-decoration: none; color: black"><h1>Todo List</h1></a>      
        </header>
      </div>
      <!--endheader-->
      

      <div class="logBox">
        <form method="POST">
          <h1  class="font-weight-normal text-primary">LOGOWANIE</h1>
          <br>
          <input style="width: 50%;" name="login"  class="form-control" placeholder="Login" required>
          <br>
          <div class="input-group" class="form-control" style="width: 50%;">
            <input type="password" class="form-control" id="password_hidden" name="password" placeholder="Hasło" required>
            <span class="input-group-btn">
              <button class="btn btn-default reveal" style="background-color:white; margin-top:2px; height:35px;"  type="button"><img src="eye_hidden.png" style="margin-top:-6px;" width="25"></button>
            </span>          
          </div>
          </br>
          <?php
                if(isset($_SESSION['e_zledane'])){
                    echo '<div class="error">'.$_SESSION['e_zledane'].'</div>';
                    unset($_SESSION['e_zledane']);
                }
            ?> 
          <input type="submit" class="btn btn-primary" name="zaloguj" value="Zaloguj">
          <br><br>
          <a class="registerLink" style="text-decoration: none;" href="register.php">Nie masz konta, zarejestruj się!</a>
          <br>
          <br>
        </form>
      </div>
    </div>
    <script>
    //Skrypt na odkrywanie hasła
    $(".reveal").on('click',function() {
        var pwd = document.getElementById("password_hidden")
        if (pwd.type === 'password') {
            pwd.type="text";
        } else {
            pwd.type="password"
        }
    });
    </script>
  </body>
</html>