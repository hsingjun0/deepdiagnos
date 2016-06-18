<?php
    /*** mysql hostname ***/
    $hostname = 'localhost';

    /*** mysql username ***/
    $username = 'username';

    /*** mysql password ***/
    $password = 'password';

    /*** mysql databse ***/
    $dbname = 'database';

    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
        /*** echo a message saying we have connected ***/
        //echo 'Connected to database';
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }   

    $stmt = $dbh->prepare("SELECT * FROM user where name = ?");
    $stmt->execute(array($_POST['username']));
    echo $stmt->rowCount();
?>

