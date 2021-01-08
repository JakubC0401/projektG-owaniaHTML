<?php
    require_once("config.php");
    if(isset($_POST['rejestruj']))
    {
        $login=$_POST['login'];
        $password=$_POST['pw'];

        $hashPassword = password_hash($password,PASSWORD_BCRYPT);


        $add = $db -> prepare('INSERT INTO user (login,password) VALUE (:login,:password)');
        $sth->bindValue(':login', $login, PDO::PARAM_STR);
        $sth->bindValue(':password', $hashPassword, PDO::PARAM_STR);
        $sth->execute();

        
        die('Rejestracja pomyslna!');
    }
?>