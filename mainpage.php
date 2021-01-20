<?php
function addNewNote($tabela, $buttonName){
    $conn = mysqli_connect("localhost", "root", "", 'notes'); 
    if(isset($_POST[$buttonName])){
        $sql = "INSERT INTO ". $tabela ." (notatka) VALUES ('".$_POST["newNote"]."')";   
        if ($conn->query($sql))
            echo "<p>Dodano notatkę!</p><br>";
        else 
            echo "Error: " . $sql . "<br>" . $conn->error;
    } 
}

function showNotes($tabela){
    $conn = mysqli_connect("localhost", "root", "", 'notes'); 
    $sql = "SELECT * FROM " . $tabela;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li><p>" . $row['notatka'] . "</p></li><br>";
        }
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <div class="test">
        <header class="siteLogo"> 
          <img src="Pagelogo.png" width="50px" height="50px"> 
          <a href="" style="text-decoration: none; color: black"><h1>Todo List</h1></a>
        </header>
        <div>
            <ul class="mainpageheader">
                <li><a class="AnimateButton" href="regulamin.php">REGULAMIN</a></li>
                <li><a class="AnimateButton" href="link">KONTO</a></li>
                <li><a class="AnimateButton" href="link">WYLOGUJ</a></li>
            </ul> 
        </div>    
    </div>

    <div class="menu">
        <nav>
        <ul class="NotesNav">
            <li class="movedown">
                <a href="link" >ZAKUPY</a><br><br>
                <ul style="list-style-type:none">     
                    <form method="POST">
                        <input type="text" placeholder="Wpisz notatkę" name="newNote" class="form-control" style="width: 50%; float: left;"/>
                        <input type="submit" value="Dodaj" name="dodajZakupy" class="btn btn-secondary"/>
                    </form><br>                             
                        <?php 
                            addNewNote("zakupy","dodajZakupy");
                            showNotes("zakupy");
                        ?>                    
                </ul>
            </li>            
            <li class="movedown">
                <a href="link">STUDIA</a><br><br>
                <ul style="list-style-type:none">
                    <form method="POST">
                        <input type="text" placeholder="Wpisz notatkę" name="newNote" class="form-control" style="width: 50%; float: left;"/>
                        <input type="submit" value="Dodaj" name="dodajStudia" class="btn btn-secondary"/>
                    </form><br>                           
                        <?php 
                            addNewNote("studia","dodajStudia");
                            showNotes("studia");
                        ?>                   
                </ul>
            </li>
            <li class="movedown">
                <a href="link">WAKACJE</a><br><br>
                <ul style="list-style-type:none">
                    <form method="POST">
                        <input type="text" placeholder="Wpisz notatkę" name="newNote" class="form-control" style="width: 50%; float: left;"/>
                        <input type="submit" value="Dodaj" name="dodajWakacje" class="btn btn-secondary"/>
                    </form><br>                             
                        <?php 
                            addNewNote("wakacje","dodajWakacje");
                            showNotes("wakacje");
                        ?>                     
                </ul>
            </li>
            <li class="movedown">
                <a href="link">ZAJĘCIA</a><br><br>
                <ul style="list-style-type:none">
                    <form method="POST">
                        <input type="text" placeholder="Wpisz notatkę" name="newNote" class="form-control" style="width: 50%; float: left;"/>
                        <input type="submit" value="Dodaj" name="dodajZajecia" class="btn btn-secondary"/>
                    </form><br>                             
                        <?php 
                            addNewNote("zajecia","dodajZajecia");
                            showNotes("zajecia");
                        ?>                    
                </ul>
            </li>
        </ul>
        </nav>
    </div>
</body>
</html>