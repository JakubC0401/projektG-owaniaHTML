
<?php        
  //$conn = mysqli_connect("userdb1", "1202557_i5E183", "zG1MPHPlyigmJ8", '1202557_i5E183');
  $conn = mysqli_connect("localhost", "root", "", 'users');
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
            <input type="password" class="form-control" id="password_hidden" name="password" placeholder="Hasło" required minlength="6">
            <span class="input-group-btn">
              <button class="btn btn-default reveal" style="background-color:white; margin-top:2px; height:35px;"  type="button"><img src="eye_hidden.png" style="margin-top:-6px;" width="25"></button>
            </span>          
          </div>
          <br>
          <div class="input-group" class="form-control" style="width: 50%;">
            <input type="password" class="form-control" id="password_hidden2" name="repeatPassword" placeholder="Powtórz hasło" required minlength="6">
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
        <a class="registerLink" href="index.php">Masz konto? Zaloguj się!</a>
        <br>
        <br>
        
      </div>
      
      <!-- Regulamin jakis -->
      <div class="modal" id="popUp">
        <div class="modal-content">
          <span class="close">&times;</span>
          <p>Regulamin 1.</p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu eros id orci bibendum vestibulum. Nunc mattis tortor ante, eget lacinia tellus euismod vel. Donec nulla est, molestie a convallis ut, luctus id dolor. Mauris ultricies aliquam metus, sed auctor ligula laoreet sed. Fusce congue, urna pulvinar mollis mollis, ligula mauris consectetur est, sed hendrerit neque odio quis eros. Quisque metus ante, fringilla quis laoreet ac, semper sit amet risus. Donec scelerisque semper nisi ac commodo. Aliquam malesuada aliquet nunc. Pellentesque fringilla cursus nisi ac sollicitudin. Duis non pharetra tortor. Donec tincidunt, leo at pharetra varius, elit orci posuere velit, vitae sodales quam justo in orci. Fusce convallis viverra neque, at vehicula elit pellentesque at. Nulla nibh arcu, laoreet vel imperdiet non, euismod placerat nisi. Sed hendrerit odio sed diam ornare, id fermentum arcu convallis.
            Donec justo tortor, hendrerit vitae blandit ut, lacinia vitae sem. Nullam fringilla felis eu sapien mollis, ut dapibus erat finibus. Morbi nec elementum elit. Mauris libero sem, aliquet non faucibus non, fringilla ut tellus. In eget erat non diam dapibus placerat. Fusce vel est a leo mollis sollicitudin a et est. Duis quis quam a leo sagittis rhoncus. Curabitur nec molestie magna, sed tincidunt nisl. Curabitur ante neque, consectetur et faucibus ut, posuere in felis. Morbi sit amet dolor a libero hendrerit feugiat id in magna. In hac habitasse platea dictumst. Nam eu ultrices neque. Vestibulum placerat ante ac sollicitudin gravida. Aenean maximus tincidunt venenatis. Etiam aliquam nisl vitae lacus dapibus ornare.
            Fusce et ornare nisi. Curabitur dictum odio arcu, et viverra sem semper at. Suspendisse vel odio a magna auctor pulvinar. Proin ullamcorper elementum velit non laoreet. Suspendisse vel molestie justo. Morbi faucibus lorem dui, id ultrices libero vestibulum et. Proin consequat posuere luctus. Donec sollicitudin mauris eu risus mollis semper eu gravida purus.
            Sed eget convallis lorem, quis tempor risus. Donec mollis ex venenatis nunc rhoncus, sodales rhoncus leo lobortis. In ac dictum mi. Fusce varius eu diam sit amet interdum. Etiam tincidunt lacus a sem malesuada, vel lacinia orci vestibulum. Donec dignissim sem vitae augue accumsan, ut tempor sapien volutpat. In hendrerit justo gravida quam consequat imperdiet. Nam suscipit lobortis augue, in laoreet libero sodales id. Etiam quis mollis dui, in laoreet ipsum. Nullam porttitor mollis libero, quis varius lacus congue ac. Suspendisse nec tempor est, ut dictum ante. In pretium libero et elit blandit malesuada. Nam convallis blandit risus, sit amet porttitor arcu pretium et. Maecenas eu efficitur arcu. Aliquam tincidunt consectetur tincidunt.
            Vestibulum volutpat, nisi quis semper tristique, mi lectus hendrerit nibh, in posuere turpis libero dictum purus. Pellentesque facilisis, massa at ullamcorper placerat, turpis arcu pharetra tellus, et rutrum enim mi eget tellus. Vivamus metus nisl, interdum sit amet porttitor vel, eleifend non augue. Curabitur ultricies, dolor a malesuada consequat, augue libero vulputate lectus, pretium ornare quam risus ac ex. In ultricies tellus vel vestibulum vulputate. Praesent erat leo, mattis id massa quis, sagittis sagittis metus. Nunc venenatis arcu in lobortis semper. Praesent tempor metus quis velit placerat laoreet. Integer vel placerat mauris, quis convallis dolor.
          </p>          
        </div>
      </div>
      <script>        
        var modal = document.getElementById("popUp"); 
        var clickText = document.getElementById("regulaminTxt");
        var span = document.getElementsByClassName("close")[0];
        clickText.onclick = function() {
          modal.style.display = "block";
        }
        span.onclick = function() {
          modal.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
        <!-- koniec Regulamin jakis -->


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