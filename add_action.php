<?php

    require '/home4/amasyn/public_html/marvelousglass.com/actions/inc/header.php';
    
    //database info
    $servername = "localhost";
    $username = "amasyn_local";
    $password = "Cogimetrics100";
    $dbname = "amasyn_actions_db";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    
?>
<?php
	if(isset($_POST['submit'])){
	print_r($_POST);
	// make query and submit it
            $action_arr = $_POST['action_id'];
            //$client_id = $_POST['id'];
            $c_action = implode(", ", $action_arr);
            //echo $c_action;
            $acc_name = $_POST['acc_name'];
            //echo $acc_name;
            
            try{
                
                $database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
                $database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "UPDATE clients SET saved_actions='$c_action' WHERE account_name='$acc_name'";
                //prepare
                $stmt = $database_connection->prepare($sql);
                $stmt->execute();
                echo $stmt->rowCount() . " records UPDATED successfully";

                } catch(PDOException $z){
                
                    die($z->getMessage());
                
                }
  	}
?>
<title>Add Action Dashboard</title>
</head>
		<body>
		<hr />
		<a href="http://marvelousglass.com/actions/inc/action-dashboard.php">Main Dashboard</a>
		<a href="http://marvelousglass.com/actions/inc/add-client.php/">Add Client</a>
		<a href="http://marvelousglass.com/actions/inc/add-action.php">Add Action</a>

		</body>
</html>