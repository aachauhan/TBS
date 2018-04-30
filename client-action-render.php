<?php
    //database info
    $servername = "localhost";
    $username = "amasyn_local";
    $password = "Cogimetrics100";
    $dbname = "amasyn_actions_db";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    try{
                    
        $database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

    } catch(PDOException $z){
        die($z->getMessage());
    }
?>
