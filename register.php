
<?php        
  require_once "config.php";
  $conn = mysqli_connect($host, $user, $password, $db);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }



  if (isset($_POST['sumbit']))
  {    
      $login = $_POST['login'];
      $haslo1 = $_POST['password'];
      $haslo2 = $_POST['repeatPassword'];
      $sql = "SELECT login FROM users WHERE login = '" .$login. "';";
      $x = mysqli_num_rows(mysqli_query($conn, $sql));
      if ( $x == 0)
      {
          if ($haslo1 == $haslo2)
          {
              mysqli_query($conn,"INSERT INTO `users` (`login`, `password`)
                  VALUES ('".$login."', '".md5($haslo1)."');");                
              echo "<h2>Konto zostało stworzone!</h2>";
              header("Location: index.php");
          }
          else echo "<h2>Hasła nie są takie same!</h2>";
      }
      else
      { 
          $_SESSION['e_login']="Istnieje już konto przypisane do tego loginu!";
      }
  }
  

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Todo List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="PageLogo.png" type="image">

    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    <div class="wrapper">
    <?php require('basicHeader.html'); ?>
     
      <div class="registerBox">
        <form method="post">
          <h1  class="font-weight-normal text-primary">REJESTRACJA</h1>
          <br>
          <input style="width: 50%;" class="form-control" placeholder="Imię">
          <br>          
          <input style="width: 50%;" class="form-control" placeholder="Nazwisko">
          <br>         
          <input style="width: 50%;" class="form-control" name="login" placeholder="Login" required>
          <?php
                if(isset($_SESSION['e_login'])){
                    echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                    unset($_SESSION['e_login']);
                }
            ?> 
                     <br>         
          <input style="width: 50%;" class="form-control" type="email" name="email" placeholder="Email" required>
          <br>
          <div class="input-group" class="form-control" style="width: 50%;">
            <input type="password" class="form-control" id="password_hidden" name="password" placeholder="Hasło" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Hasło musi zawierać przynajmniej jedną małą i dużą literę, jedną cyfrę i 6 lub więcej znaków" required>
            <span class="input-group-btn">
              <button class="btn btn-default reveal" style="background-color:white; margin-top:2px; height:35px;"  type="button"><img src="eye_hidden.png" style="margin-top:-6px;" width="25"></button>
            </span>          
          </div>
          <br>
          <div class="input-group" class="form-control" style="width: 50%;">
            <input type="password" class="form-control" id="password_hidden2" name="repeatPassword" placeholder="Powtórz hasło" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Hasło musi zawierać przynajmniej jedną małą i dużą literę, jedną cyfrę i 6 lub więcej znaków" required>
            <span class="input-group-btn">
              <button class="btn btn-default reveal2" style="background-color:white; margin-top:2px; height:35px;"  type="button"><img src="eye_hidden.png" style="margin-top:-6px;" width="25"></button>
            </span>          
          </div>
          <br>       
          <input type="checkbox" id="regulamin" required/>
          <label for="regulamin">Akceptuję </label>
          <label id="regulaminTxt" class="onText"><u>regulamin</u></label>
          <br>
          <br> 
          <button type="submit" class="btn btn-primary" name="sumbit">Zarejestruj się</button>
          <br> 
          <br>          
        </form>
        <a class="registerLink" style="text-decoration: none;" href="index.php">Masz konto? Zaloguj się!</a>
        <br>
        <br>
        
      </div>
      
      <?php require('regulamin.php'); ?>

      <footer class="footer">
        <p>©2020 Author: Jakub Czyż, Błażej Aleksandrzak, Dawid Badura</p>
      </footer>
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
    $(".reveal2").on('click',function() {
        var pwd = document.getElementById("password_hidden2")
        if (pwd.type === 'password') {
            pwd.type="text";
        } else {
            pwd.type="password"
        }
    });
    </script>
  </body>
</html>