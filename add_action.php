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
            //the problem with this one is I can't catch the value of the ACTION DESC - 

            //Problem is $_POST['ACTION_DESC'] is bringing the value of one ACTION

            $db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $entry_res = $db_connect->prepare($entry);
            $entry_res->execute();
            echo $entry;
            echo "\n";
            echo $entry_res->rowCount() . " entries";
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
                    

                    for($count = 0; $count < count(json_decode($json)) ; $count++){
                        
                        $id_value = $someArr[$count]["id"];
                        //echo "<input class='' id='" . $someArr[$count]["program_name"] ."' name='program_name[]' type='label' value='" . $someArr[$count]["program_name"] ."'>";
                        $program_name_value = $someArr[$count]["program_name"];
                        //echo "<input class='' id='" . $someArr[$count]["action_desc"] ."' name='action_desc[]' type='label' value='" . $someArr[$count]["action_desc"] ."'>";
                        $action_desc_value = $someArr[$count]["action_desc"];
                        //echo "<input class='' id='" . $someArr[$count]["action_group"] ."' name='action_group[]' type='label' value='" . $someArr[$count]["action_group"] ."'>";
                        $action_group_value = $someArr[$count]["action_group"];
                        //echo "<input class='' id='" . $someArr[$count]["action_role"] ."' name='action_role[]' type='label' value='" . $someArr[$count]["action_role"] ."'>";
                        $action_role_value = $someArr[$count]["action_role"];
                        $actn_status = "working";
                        $actn_comment = "COMMENT";
                        
                        // I have to wrap the following steps in a logic that stops duplication using uniqueness of each entry
                        // for the logic we need what!!
                        //query to enter data in the database
                        //in the next line we swipe acc startdate with dat the implications of these are that we are storing the start date as this custom date not the date from the creation of client
                        /*$sql_data = "INSERT INTO client_actions (acc_advocate, client_name, sales_assoc, start_date, program_name, action_desc, action_group, role, status, comment)
                        VALUES ('$acc_advocate','$acc_name','$sales_assoc','$date','$program_name_value','$action_desc_value','$action_group_value', '$action_role_value', '$actn_status', '$actn_comment')";
                        $stmt_1 = $database_connection->prepare($sql_data);
                        $stmt_1->execute();*/
                        //echo $stmt_1->rowCount() . " records UPDATED successfully\r\n";
                        //echo statement prints out the data on the output device i.e. computer screen
                    }                
                    
                    $json = json_encode($query_result);
                    $someArr =  json_decode($json, true);

                    //one way to do this is by making a function that checks if the entry is present in the database already ~ if not then add else throw exception
                    $sql_unique = "SELECT * FROM client_actions WHERE client_name = '$acc_name' AND action_desc = '$action_desc_value'";
                    checkIsDuplicated($sql_unique);

                    //Migrate the following logic to another page
                    //code to bring the data from clients_actions table and show it here
                    $sql_clientactions = $database_connection->prepare("SELECT * FROM client_actions");
                    $sql_clientactions->execute();
                    $sql_result_client_actions = $sql_clientactions->fetchAll(PDO::FETCH_ASSOC);

                    $clientaction_json = json_encode($sql_result_client_actions);
                    $client_json_array = json_decode($clientaction_json, true);
                    
                    echo "<table border='1'>";
                    echo "<tr>
                        <th>Client Name</th>
                        <th>Account Advocate</th>
                        <th>Sales Associate</th>
                        <th>Start Date</th>
                        <th>Program Name</th>
                        <th>Action Description</th>
                        <th>Action Group</th>
                        <th>Action Role</th>
                        <th>Action Status</th>
                        <th>Comment</th>
                        </tr>";
                    for($count = 0; $count < count(json_decode($clientaction_json)) ; $count++){
                        echo "<tr>";
                        echo "<td>" .$client_json_array[$count]["client_name"] . "</td>";
                        echo "<td>". $client_json_array[$count]['acc_advocate']."</td>";
                        echo "<td>" .$client_json_array[$count]["sales_assoc"] . "</td>";
                        echo "<td>" .$client_json_array[$count]["start_date"] . "</td>";
                        echo "<td>" .$client_json_array[$count]["program_name"] . "</td>";
                        echo "<td>". $client_json_array[$count]["action_desc"] ."</td>";
                        echo "<td>". $client_json_array[$count]["action_group"] ."</td>";
                        echo "<td>". $client_json_array[$count]["role"] ."</td>";
                        echo "<td>". $client_json_array[$count]["status"] ."</td>";
                        echo "<td>". $client_json_array[$count]["comment"] ."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    //TILL HERE


                    //setup the query
                    //execute query
                    //run for loop or whatever to bring the table

                    } catch(PDOException $z){
                    
                        die($z->getMessage());
                    
                    }
  	}
?>
		<hr />
		<a href="http://marvelousglass.com/actions/inc/action-dashboard.php">Main Dashboard</a>
		<a href="http://marvelousglass.com/actions/inc/add-client.php/">Add Client</a>
		<a href="http://marvelousglass.com/actions/inc/add-action.php">Add Action</a>

		</body>
</html>