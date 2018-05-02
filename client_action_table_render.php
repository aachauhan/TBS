<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
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
                        <th>Id</th>
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
                        echo "<td name='action_id' id='action_id'>" .$client_json_array[$count]["id"] . "</td>";
                        echo "<td>" .$client_json_array[$count]["client_name"] . "</td>";
                        echo "<td>". $client_json_array[$count]['acc_advocate']."</td>";
                        echo "<td>" .$client_json_array[$count]["sales_assoc"] . "</td>";
                        echo "<td>" .$client_json_array[$count]["start_date"] . "</td>";
                        echo "<td>" .$client_json_array[$count]["program_name"] . "</td>";
                        echo "<td>". $client_json_array[$count]["action_desc"] ."</td>";
                        echo "<td>". $client_json_array[$count]["action_group"] ."</td>";
                        echo "<td>". $client_json_array[$count]["role"] ."</td>";
                        echo "<td><select name='status_val' id='status_val' onchange='render_dropdown()'>". "<option value='working'>" . $client_json_array[$count]["status"] . "</option>" . "<option value='completed'>completed</option>" . "</select></td>";
                        echo "<td><input type='text' name='comment' /></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    //TILL HERE

    } catch(PDOException $z){
        die($z->getMessage());
    }
?>
<script>
    function ajx_request(){
        $.ajax({
            type: 'POST',
            url: 'client_status_update.php',
            data: {data1: $('#action_id').val(), data2: $('status_val').val()},
            dataType: 'text',
            success: function(data)
            {
                console.log('added');
                console.log(data);
            }
        });
    }

    function render_dropdown(){
        console.log("Changed");
        ajx_request();
        console.log($('#action_id').val());
        console.log($('#status_val').val());
    }
</script>