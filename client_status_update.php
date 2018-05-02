<?php

$servername = "localhost";
$username = "amasyn_local";
$password = "Cogimetrics100";
$dbname = "amasyn_actions_db";

$con = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST)){
    $action_id = $_POST['id'];
    $status = $_POST['status_val'];

    echo $action_id;
    echo $status;

    try{
                    
        $database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query_status_update = $database_connection->prepare("UPDATE client_actions SET status = '$status' WHERE id = '$action_id'");
        $query_status_update->execute();
        echo $query_status_update->rowCount() . " records UPDATED successfully";


    } catch(PDOException $z){
        die($z->getMessage());
    }
}

?>