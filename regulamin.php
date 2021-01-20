<?php
    //$conn = mysqli_connect("localhost", "root", "", 'users'); 
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
          <a href="mainpage.php" style="text-decoration: none; color: black"><h1>Todo List</h1></a>
        </header>
        <div>
            <ul class="mainpageheader">
                <li><a class="AnimateButton" href="mainpage.php">STRONA GŁÓWNA</a></li>
                <li><a class="AnimateButton" href="accountpage.php">KONTO</a></li>
                <li><a class="AnimateButton" href="link">WYLOGUJ</a></li>
            </ul> 
        </div>    
    </div>

    <div class="regulaminBox">
        <h1 class="font-weight-normal text-primary">REGULAMIN</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu eros id orci bibendum vestibulum. Nunc mattis tortor ante, eget lacinia tellus euismod vel. Donec nulla est, molestie a convallis ut, luctus id dolor. Mauris ultricies aliquam metus, sed auctor ligula laoreet sed. Fusce congue, urna pulvinar mollis mollis, ligula mauris consectetur est, sed hendrerit neque odio quis eros. Quisque metus ante, fringilla quis laoreet ac, semper sit amet risus. Donec scelerisque semper nisi ac commodo. Aliquam malesuada aliquet nunc. Pellentesque fringilla cursus nisi ac sollicitudin. Duis non pharetra tortor. Donec tincidunt, leo at pharetra varius, elit orci posuere velit, vitae sodales quam justo in orci. Fusce convallis viverra neque, at vehicula elit pellentesque at. Nulla nibh arcu, laoreet vel imperdiet non, euismod placerat nisi. Sed hendrerit odio sed diam ornare, id fermentum arcu convallis.
                Donec justo tortor, hendrerit vitae blandit ut, lacinia vitae sem. Nullam fringilla felis eu sapien mollis, ut dapibus erat finibus. Morbi nec elementum elit. Mauris libero sem, aliquet non faucibus non, fringilla ut tellus. In eget erat non diam dapibus placerat. Fusce vel est a leo mollis sollicitudin a et est. Duis quis quam a leo sagittis rhoncus. Curabitur nec molestie magna, sed tincidunt nisl. Curabitur ante neque, consectetur et faucibus ut, posuere in felis. Morbi sit amet dolor a libero hendrerit feugiat id in magna. In hac habitasse platea dictumst. Nam eu ultrices neque. Vestibulum placerat ante ac sollicitudin gravida. Aenean maximus tincidunt venenatis. Etiam aliquam nisl vitae lacus dapibus ornare.
                Fusce et ornare nisi. Curabitur dictum odio arcu, et viverra sem semper at. Suspendisse vel odio a magna auctor pulvinar. Proin ullamcorper elementum velit non laoreet. Suspendisse vel molestie justo. Morbi faucibus lorem dui, id ultrices libero vestibulum et. Proin consequat posuere luctus. Donec sollicitudin mauris eu risus mollis semper eu gravida purus.
                Sed eget convallis lorem, quis tempor risus. Donec mollis ex venenatis nunc rhoncus, sodales rhoncus leo lobortis. In ac dictum mi. Fusce varius eu diam sit amet interdum. Etiam tincidunt lacus a sem malesuada, vel lacinia orci vestibulum. Donec dignissim sem vitae augue accumsan, ut tempor sapien volutpat. In hendrerit justo gravida quam consequat imperdiet. Nam suscipit lobortis augue, in laoreet libero sodales id. Etiam quis mollis dui, in laoreet ipsum. Nullam porttitor mollis libero, quis varius lacus congue ac. Suspendisse nec tempor est, ut dictum ante. In pretium libero et elit blandit malesuada. Nam convallis blandit risus, sit amet porttitor arcu pretium et. Maecenas eu efficitur arcu. Aliquam tincidunt consectetur tincidunt.
                Vestibulum volutpat, nisi quis semper tristique, mi lectus hendrerit nibh, in posuere turpis libero dictum purus. Pellentesque facilisis, massa at ullamcorper placerat, turpis arcu pharetra tellus, et rutrum enim mi eget tellus. Vivamus metus nisl, interdum sit amet porttitor vel, eleifend non augue. Curabitur ultricies, dolor a malesuada consequat, augue libero vulputate lectus, pretium ornare quam risus ac ex. In ultricies tellus vel vestibulum vulputate. Praesent erat leo, mattis id massa quis, sagittis sagittis metus. Nunc venenatis arcu in lobortis semper. Praesent tempor metus quis velit placerat laoreet. Integer vel placerat mauris, quis convallis dolor.
            </p>          
    </div>
</body>
</html>