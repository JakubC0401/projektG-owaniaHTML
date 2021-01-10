
<?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", 'user');
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
  
    <div class="wrapper">
      <!--header-->
      <div class="test">
        <header class="siteLogo"> 
          <img src="Pagelogo.png" width="50px" height="50px"> 
          <a href="index.html" style="text-decoration: none; color: black"><h1>Todo List</h1></a>      
        </header>
      </div>
      <!--endheader-->
      

      <div class="logBox">
        <form method="POST">
          <h1  class="font-weight-normal text-primary">LOGOWANIE</h1>
          <br>
          <input style="width: 50%;" name="login"  class="form-control" placeholder="Login" required>
          <br>
          <div class="form-group">
            <input style="width: 50%;" type="password" name="password" class="form-control" placeholder="Hasło" required>
          </div>
          <?php
                if(isset($_SESSION['e_zledane'])){
                    echo '<div class="error">'.$_SESSION['e_zledane'].'</div>';
                    unset($_SESSION['e_zledane']);
                }
            ?> 
          <input type="submit" class="btn btn-primary" name="zaloguj" value="Zaloguj">
          <br>
          <a class="registerLink" href="register.php">Nie masz konta, zarejestruj się!</a>
          <br>
          <br>
        </form>
      </div>
      
    </div>
  </body>
</html>