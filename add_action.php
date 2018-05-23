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

<title>Add Action Dashboard</title>
</head>
		<body>
        <?php

        function checkIsDuplicated($entry){
            $db_connect = new PDO("mysql:host=$servername; dbname=amasyn_actions_db","amasyn_local","Cogimetrics100");
            $db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $entry_res = $db_connect->prepare($entry);
            $entry_res->execute();
            //echo $entry;
            echo "\n";
            //echo $entry_res->rowCount() . " entries";
            if($entry_res->rowCount()>0){
                return false;
            }
            else{
                return true;
            }
        }

        if(isset($_POST['submit'])){
        //print_r($_POST);
        // make query and submit it
                $action_arr = $_POST['action_id'];
                //$client_id = $_POST['id'];
                $c_action = implode(", ", $action_arr);
                //echo $c_action;
                $acc_name = $_POST['acc_name'];
                $acc_advocate = $_POST['acc_advocate'];
                $sales_assoc = $_POST['sales_associate'];
                $acc_startdate = $_POST['acc_strtdate'];
                $date = $_POST['date'];

                try{
                    
                    $database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
                    $database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    //Query to update clients database according to the data sent from last page
                    $sql = "UPDATE clients SET saved_actions='$c_action' WHERE account_name='$acc_name'";
                    $stmt = $database_connection->prepare($sql);
                    $stmt->execute();
                    echo $stmt->rowCount() . " records UPDATED successfully";
                    //Update client area ENDS

                    //GET all the details from the actions table
                    $sql_action = "SELECT * FROM actions WHERE id IN ({$c_action})";
                    $query_res = $database_connection->prepare($sql_action);
                    $query_res->execute();
                    $query_result = $query_res->fetchAll(PDO::FETCH_ASSOC);
                    $json = json_encode($query_result);
                    $someArr =  json_decode($json, true);

                    //echo $sql_action;
                    $ad_value = [];

                    for($i=0; $i < count(json_decode($json)); $i++){
                        $holder = $someArr[$i]["id"];
                        array_push($ad_value, $holder);
                    }
                    $val_desc = implode(", ", $ad_value);
                    //echo $val_desc;

                  

                    //one way to do this is by making a function that checks if the entry is present in the database already ~ if not then add else throw exception
                    // now have to integrate the date in the query too - Adding the date will give us more control over the uniqueness condition
                $sql_unique = "SELECT * FROM client_actions WHERE client_name = '$acc_name' AND action_id IN ({$val_desc}) AND start_date = '$date'";
                    if(checkIsDuplicated($sql_unique)){
                        echo "DO IT";
                        for($count = 0; $count < count(json_decode($json)) ; $count++){
                            
                            //Adding the values in client actions table
                            $id_value = $someArr[$count]["id"];
                            $program_name_value = $someArr[$count]["program_name"];
                            $action_desc_value = $someArr[$count]["action_desc"];
                            $action_group_value = $someArr[$count]["action_group"];
                            $action_role_value = $someArr[$count]["action_role"];
                            $action_id_value = $someArr[$count]["id"];
                            $actn_status = "";   //Have to integrate the action status as checkbox
                            $actn_comment = "";  //Have to integrate the action comment as input box
                            $sql_data = "INSERT INTO client_actions (acc_advocate, client_name, sales_assoc, start_date, program_name, action_desc, action_group, role, action_id, comment)
                            VALUES ('$acc_advocate','$acc_name','$sales_assoc','$date','$program_name_value','$action_desc_value','$action_group_value', '$action_role_value', '$action_id_value', '$actn_comment')";
                            $stmt_1 = $database_connection->prepare($sql_data);
                            $stmt_1->execute();
                        }
                    }
                    else{
                        echo "DO NOT DO IT";
                    }

                    } catch(PDOException $z){
                    
                        die($z->getMessage());
                    
                    }
                    
                    //to persist dropdown here is resource
                    //https://stackoverflow.com/questions/23321594/update-database-after-select-option-change
                    //send id of action and value using ajax, onchange to a php function that looks in client actions table and updates the value of the status
                    
                    
                    //table rendering using the code on the file below
                    require '/home4/amasyn/public_html/marvelousglass.com/actions/inc/client-action-render.php';
  	}
?>
		<hr />
		<a href="http://marvelousglass.com/actions/inc/action-dashboard.php">Main Dashboard</a>
		<a href="http://marvelousglass.com/actions/inc/add-client.php/">Add Client</a>
		<a href="http://marvelousglass.com/actions/inc/add-action.php">Add Action</a>
		<a href="http://marvelousglass.com/actions/inc/client-action-render.php">Dashboard 2.0</a>

		</body>
</html>