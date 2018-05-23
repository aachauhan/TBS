<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<?php
	echo "<form action='#' method='post'>";
	echo "<label for='client_name'> Client Name </label><input type='text' id='c_name' name='client_name' />";
    echo "<label for='actn_grp'> Action Group </label><input type='text' id='actn_group' name='actn_grp' />";
    echo "<label for='actn_role'> Action Role </label><input type='text' id='action_role' name='actn_role' />";
    echo "<label for='actn_status'> Action Status </label><input type='text' id='action_status' name='actn_status' />";
    echo "<label for='date_start'> Date </label><input type='date' id='date_strt' name='date_start' /><br>";
    echo "<input type='submit' value='Submit' />";
    echo "</form>";
    echo "<hr/>"
    echo "<hr/>";
?>
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
        
        //accessing database usin PDO to curb security vulnerabilities 
        $database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//https://stackoverflow.com/questions/36596318/select-onchange-update-php-value
        //Migrate the following logic to another page
        //the 80 - 20 rule - pareto rule
        //code to bring the data from clients_actions table and show it here
        //working on persisting the data to the database
        //bring the logic of multiple checkbox id's in an array to this page
        //workers for the queen bee
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
                        echo "<input type='hidden' name='action_id[]' value=". $client_json_array[$count]["id"]  ." />";
                        echo "<td>" .$client_json_array[$count]["client_name"] . "</td>";
                        echo "<td>". $client_json_array[$count]['acc_advocate']."</td>";
                        echo "<td>" .$client_json_array[$count]["sales_assoc"] . "</td>";
                        echo "<td>" .$client_json_array[$count]["start_date"] . "</td>";
                        echo "<td>" .$client_json_array[$count]["program_name"] . "</td>";
                        echo "<td>". $client_json_array[$count]["action_desc"] ."</td>";
                        echo "<td>". $client_json_array[$count]["action_group"] ."</td>";
                        echo "<td>". $client_json_array[$count]["role"] ."</td>";
                        echo "<td><select name='status_val[]' id='".$client_json_array[$count]["id"]. "'>". "<option value='--'>".$client_json_array[$count]["status"]."</option><option value='working'>working</option>" . "<option value='completed'>completed</option>" . "</select></td>";
                        echo "<td><input id='". $client_json_array[$count]["id"] ."' type='text' name='comment' value='".$client_json_array[$count]["comment"]."' /></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "<p id='msg_ajax'> </p>";
                    //TILL HERE

    } catch(PDOException $z){
        die($z->getMessage());
    }

?>
<script>
    $("[name='status_val[]']").on('change', function() {
    	var pie_status = $(this).val();
    	var pie_id = $(this).attr("id");
    	console.log(pie_status);
    	console.log(pie_id);
        $.ajax({
            type: "POST",
            url: "client_status_update.php",
            data: {'a_status': pie_status, 'a_id': pie_id},
            success: function (json) {
                //success message
                var successMsg = "Success";
                $("#msg_ajax").text(successMsg);
            }
        });
    });
    $("[name='comment']").on('change', function(){
        var comment_text = $(this).val();
        var p_id = $(this).attr("id");
        //console.log(comment_text);
        //console.log(p_id);
        $.ajax({
            type: "POST",
            url: "client_status_update.php",
            data: {'a_comment': comment_text, 'a_id': p_id},
            success: function (json) {
                //success message
                var successMsg = "Success";
                $("#msg_ajax").text(successMsg);
            }
        });
    });
</script>