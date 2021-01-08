<?php
    try
    {
     $db = new PDO('mysql:host==userdb1;dbname=1202557_i5E183', '1202557_i5E183', 'zG1MPHPlyigmJ8');
    }
    catch (PDOException $e)
    {
        die ("Error connecting to database!");
    }
?>