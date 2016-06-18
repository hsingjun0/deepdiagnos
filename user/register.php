<?php

if(isset($_POST["user_email"]) && !empty($_POST["user_email"])){

    $servername = "mysql1.000webhost.com";
    $username   = "a9924083_admin";
    $password   = "Password1";
    $dbname     = "a9924083_db1";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $user_email = $_POST['user_email'];
        $valemail = $conn->prepare("SELECT * FROM allUsers WHERE user_email=:email");
        $valemail->execute(array(":email"=>$user_email));
        $count = $valemail->rowCount();

        if($count==0){
            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO allUsers (user_name ,user_email, password,joinDate) VALUES (:uname, :uemail,:pwd, :jdate)");
            $stmt->bindParam(':uname', $user_name);
            $stmt->bindParam(':uemail', $user_email);
            $stmt->bindParam(':pwd', $user_pwd);
            $stmt->bindParam(':jdate', $joining_date);

            $user_name  = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_pwd   = $_POST['user_pwd'];
            $joining_date =date('Y-m-d H:i:s');
            $stmt->execute();

            //header("Location: http://deepdiagnos.com/user/user_dash.html");
            
            // insert another row
            //$user_name = "Julie2";
            //$user_email = "julie2@example.com";
            //$user_pwd = '123456';
            //$joining_date =date('Y-m-d H:i:s');
            //$stmt->execute();

            //echo "New records created successfully";
        }
        else{
            echo "1"; //  not available
        }
    }
    catch(PDOException $e)
        {
        	echo "Error: " . $e->getMessage();
        }
    	$conn = null;

}
?>
