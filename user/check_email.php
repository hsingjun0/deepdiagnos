<?php

if(isset($_POST["user_email"]) && !empty($_POST["user_email"])){

    $servername = "localhost";
    $username   = "user_dd_admin";
    $password   = "Password1";
    $dbname     = "dd_user";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // check if email already exists
        $user_email = $_POST['user_email'];

        $stmt = $conn->prepare("SELECT * FROM allUsers WHERE user_email=:uemail");
        $stmt->execute(array(":uemail"=>$user_email));
        $count = $stmt->rowCount();


        if($count==0){
            echo "0";
        }
        else{
            echo "1"; // email not available
        }
    }
    catch(PDOException $e){
            echo "Error: " . $e->getMessage();
    }
    $conn = null;

}


?>
