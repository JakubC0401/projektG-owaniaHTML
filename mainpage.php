<?php
session_start();

function addNewNote($tabela, $buttonName){
    $conn = mysqli_connect("localhost", "root", "", 'notes');

    if(isset($_POST[$buttonName])){
        $sql = "INSERT INTO ". $tabela ." (notatka, userID) VALUES ('".$_POST["newNote"]."', '".$_SESSION["id"]."')";   
        if ($conn->query($sql))
            echo "<p>Dodano notatkę!</p><br>";
        else 
            echo "Error: " . $sql . "<br>" . $conn->error;
    } 
}

function showNotes($tabela){
    $userID = $_SESSION['id'];
    $conn = mysqli_connect("localhost", "root", "", 'notes'); 
    $sql = "SELECT * FROM " . $tabela . " WHERE userID = " . $userID;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>
                    <form method='POST'>
                        <p>" . $row['notatka'] . "
                        <input type='hidden' name='myId' value='". $row['id']. "'>
                        <input type='hidden' name='tabela' value='". $tabela. "'>
                        <input type='submit' alt='delete' src='crossmark.png' width='12' height='12'
                            name = 'delete' value='delete' class='btn btn-danger btn-xs'/>
                        </p>
                    </form>
                </li>
                <br>";
        }
    }
}

function changeName($newName, $tabela){
    $userID = $_SESSION['id'];
    $conn = mysqli_connect("localhost", "root", "", 'notes'); 
    $sql = "UPDATE " . $tabela . " SET nazwa = '" . $newName . "' WHERE " . $tabela . ".userID = " . $userID;
    if ($conn->query($sql)) {
       echo ""; 
    } else {
        echo "Error updating record: " . $conn->error;        
    } 
    header("Location: mainpage.php") ;
}

function showName($tabela){
    $userID = $_SESSION['id'];
    $conn = mysqli_connect("localhost", "root", "", 'notes'); 
    $sql = "SELECT nazwa FROM ".$tabela." WHERE nazwaKarty = '" . $tabela . "' and userID = '" . $userID . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $row['nazwa'];
        }
    }
    else {
       addFirstName($tabela);
    }    
}

function addFirstName($tabela){
    $userID = $_SESSION['id'];
    $conn = mysqli_connect("localhost", "root", "", 'notes'); 
    $sql = "INSERT INTO ".$tabela." (nazwa, userID, nazwaKarty) VALUES ('Nadaj nazwę!', '" . $userID . "', '".$tabela."')";   
    if ($conn->query($sql))
        echo "Nadaj nazwę!";
    else 
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <?php if (isset($_SESSION['zalogowany'])==true):?>

    <script>
         function showForm(idKarty){
            var x = document.getElementById(idKarty);
                if (x.style.display === "none") {
                   x.style.display = "block";
                } else {
                   x.style.display = "none";
                 }            
         }
    </script>

    <div class="test">
        <header class="siteLogo"> 
          <img src="Pagelogo.png" width="50px" height="50px"> 
          <a href="" style="text-decoration: none; color: black"><h1>Todo List</h1></a>
        </header>
        <div>
            <ul class="mainpageheader">
                <li><a class="AnimateButton" id="regulaminTxt" >REGULAMIN</a></li>
                <li><a class="AnimateButton" href="accountpage.php">KONTO</a></li>
                <li><a class="AnimateButton" href="logOut.php">WYLOGUJ</a></li>
            </ul> 
        </div>    
    </div>

    <?php require('regulamin.php'); ?>


    <div class="menu">
        <nav>
        <ul class="NotesNav">
            <li class="movedown">                    
                <label><?php showName("nazwakarta1"); ?></label> 
                <button class="transparentButton" onclick="showForm('changeNameForm1')"><img src='edit.png'
                        style=" width:20px; height:20px;" ></button>
                <ul style="list-style-type:none">
                <form method="POST" id="changeNameForm1" style="display:none;">
                    <input type="text" placeholder="Wpisz nazwę" name="newName" class="form-control" style="width: 50%; float: left;"/>
                    <input type="hidden" name="nazwakarty" value="nazwakarta1"/>
                    <input type="submit" value="Zmień" name="change" class="btn btn-secondary"/>
                </form><br>
                <form method="POST">
                    <input type="text" placeholder="Wpisz notatkę" name="newNote" class="form-control" style="width: 50%; float: left;"/>
                    <input type="submit" value="Dodaj" name="dodajZakupy" class="btn btn-secondary"/>
                </form><br>                             
                    <?php 
                        addNewNote("pierwszakarta","dodajZakupy");
                        showNotes("pierwszakarta");
                    ?>                    
                </ul>  
            </li>            
            <li class="movedown">
                <label><?php showName("nazwakarta2"); ?></label>
                <button class="transparentButton" onclick="showForm('changeNameForm2')"><img src='edit.png'
                        style=" width:20px; height:20px;" ></button> 
                <ul style="list-style-type:none">
                <form method="POST" id="changeNameForm2" style="display:none;">
                    <input type="text" placeholder="Wpisz nazwę" name="newName" class="form-control" style="width: 50%; float: left;"/>
                    <input type="hidden" name="nazwakarty" value="nazwakarta2"/>
                    <input type="submit" value="Zmień" name="change" class="btn btn-secondary"/>
                </form><br>
                    <form method="POST">
                        <input type="text" placeholder="Wpisz notatkę" name="newNote" class="form-control" style="width: 50%; float: left;"/>
                        <input type="submit" value="Dodaj" name="dodajStudia" class="btn btn-secondary"/>
                    </form><br>                           
                        <?php 
                            addNewNote("drugakarta","dodajStudia");
                            showNotes("drugakarta");
                        ?>                   
                </ul>
            </li>
            <li class="movedown">
                <label><?php showName("nazwakarta3"); ?></label>
                <button class="transparentButton" onclick="showForm('changeNameForm3')"><img src='edit.png'
                        style=" width:20px;height:20px;" ></button>
                <ul style="list-style-type:none">
                <form method="POST" id="changeNameForm3" style="display:none;">
                    <input type="text" placeholder="Wpisz nazwę" name="newName" class="form-control" style="width: 50%; float: left;"/>
                    <input type="hidden" name="nazwakarty" value="nazwakarta3"/>
                    <input type="submit" value="Zmień" name="change" class="btn btn-secondary"/>
                </form><br>
                    <form method="POST">
                        <input type="text" placeholder="Wpisz notatkę" name="newNote" class="form-control" style="width: 50%; float: left;"/>
                        <input type="submit" value="Dodaj" name="dodajWakacje" class="btn btn-secondary"/>
                    </form><br>                             
                        <?php 
                            addNewNote("trzeciakarta","dodajWakacje");
                            showNotes("trzeciakarta");
                        ?>                     
                </ul>
            </li>
            <li class="movedown">
                <label><?php showName("nazwakarta4"); ?></label>
                <button class="transparentButton" onclick="showForm('changeNameForm4')"><img src='edit.png'
                        style=" width:20px; height:20px;" ></button>
                <ul style="list-style-type:none">
                <form method="POST" id="changeNameForm4" style="display:none;">
                    <input type="text" placeholder="Wpisz nazwę" name="newName" class="form-control" style="width: 50%; float: left;"/>
                    <input type="hidden" name="nazwakarty" value="nazwakarta4"/>
                    <input type="submit" value="Zmień" name="change" class="btn btn-secondary"/>
                </form><br>
                    <form method="POST">
                        <input type="text" placeholder="Wpisz notatkę" name="newNote" class="form-control" style="width: 50%; float: left;"/>
                        <input type="submit" value="Dodaj" name="dodajZajecia" class="btn btn-secondary"/>
                    </form><br>                             
                        <?php 
                            addNewNote("czwartakarta","dodajZajecia");
                            showNotes("czwartakarta");
                        ?>                    
                </ul>
            </li>
        </ul>
        </nav>
        
    </div>

<?php
if(isset($_POST["change"])){            
        $newName = $_POST["newName"]; 
        $karta = $_POST["nazwakarty"];    
        changeName($newName, $karta);            
    }
if(isset($_POST["delete"])){
    $toRemove = $_POST['myId'];
    $conn = mysqli_connect("localhost", "root", "", 'notes');
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "DELETE FROM " .$_POST["tabela"]. " WHERE id = ". $toRemove;
    if ($conn->query($sql)) {
    echo "";
    } else {
    echo "Error : " . $conn->error;
    }
    header("Location: mainpage.php") ;
}
?>

<?php else: ?>
    <div class="test">
        <header class="siteLogo"> 
          <img src="Pagelogo.png" width="50px" height="50px"> 
          <a href="index.php" style="text-decoration: none; color: black"><h1>Todo List</h1></a>   
        </header>
        <div>
            <ul class="mainpageheader">
                <li><a class="AnimateButton" href="index.php" style="margin-left:66%;">ZALOGUJ</a></li>
            </ul> 
        </div>      
    </div>
<?php endif;?>
</body>
</html>