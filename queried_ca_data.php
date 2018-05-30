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
?>
<?php	        
	//incorporate logic when AND is selected
	if(isset($_POST['submit'])){
		//For testing purpose
		echo ($_POST['client_name']);
		echo "<br/>";
		echo ($_POST['actn_grp']);
		echo "<br/>";
		echo ($_POST['actn_role']);
		echo "<br/>";
		echo ($_POST['actn_status']);
		echo "<br/>";
		echo ($_POST['date_start']);
        echo "<br/>";
        //till here

        //variable initialization to be used in the query
		$cname = $_POST['client_name'];
		$a_group = $_POST['actn_grp'];
		$a_role = $_POST['actn_role'];
		$a_status = $_POST['actn_status'];
		$d_start = $_POST['date_start'];
		$cond_query = $_POST['condition_radio'];
		
        echo ("Condition Used : ".$cond_query);
        
		$database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
		$database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if($cond_query == 'and'){
            //OK! so just thought of this on the spot, but what if I incorporate other two queries from
            //else-if and if part of the queries in one single query that is sitting in one condition, that is if and is clicked
            //this can work, and there is only way to find out.
            //$query = "SELECT * FROM client_actions WHERE (client_name = '$cname' AND action_group = '$a_group') OR (client_name = '$cname' AND role = '$a_role') OR (client_name = '$cname' AND status = '$a_status') OR (action_group = '$a_group' AND role = '$a_role') OR (action_group = '$a_group' AND status = '$a_status') OR (role = '$a_role' AND status = '$a_status')";*/
            
            //this was my initial approach but didn't work :(
            //(CN and AG) or (CN and AR) or (CN and AS) or (AG and AR) or (AG and AS) or (AR and AS)
			$query_filtered = $database_connection->prepare("SELECT * FROM client_actions WHERE (client_name = '$cname' AND action_group = '$a_group') OR (client_name = '$cname' AND role = '$a_role') OR (client_name = '$cname' AND status = '$a_status') OR (action_group = '$a_group' AND role = '$a_role') OR (action_group = '$a_group' AND status = '$a_status') OR (role = '$a_role' AND status = '$a_status')");
			$query_filtered->execute();
			$query_filtered_results = $query_filtered->fetchAll(PDO::FETCH_ASSOC);
            $query_filtered_results_json = json_encode($query_filtered_results);
            //print_r($query_filtered_results_json);
            $query_filtered_json_array = json_decode($query_filtered_results_json, true);
			
		} else {
			$query_filtered = $database_connection->prepare("SELECT * FROM client_actions WHERE client_name='$cname' OR action_group='$a_group' OR role='$a_role' OR status='$a_status' OR start_date='$d_start'");
			$query_filtered->execute();
			$query_filtered_results = $query_filtered->fetchAll(PDO::FETCH_ASSOC);

                    	$query_filtered_results_json = json_encode($query_filtered_results);
                    	//print_r($query_filtered_results_json);
                    	$query_filtered_json_array = json_decode($query_filtered_results_json, true);
		}
        
        //The form - Just shows the parameters sent from last page
        // In future maybe used for further refining the searches
		echo "<form action='/actions/inc/queried_ca_data.php' method='post'>";
		echo "<label for='client_name'> Client Name </label><input type='text' id='c_name' name='client_name' value='$cname' />";
    	echo "<label for='actn_grp'> Action Group </label><input type='text' id='actn_group' name='actn_grp' value='$a_group' />";
		echo "<label for='actn_role'> Action Role </label><input type='text' id='action_role' name='actn_role' value='$a_role' />";
    	echo "<label for='actn_status'> Action Status </label><input type='text' id='action_status' name='actn_status' value='$a_status' />";
    	echo "<label for='date_start'> Date </label><input type='date' id='date_strt' name='date_start' value='$d_start' /><br>";
    	echo "</form>";
    	echo "<hr/>";
		
		try{
            //To show the results of the query from above
            // This piece of code is very common throughout the software, maybe think about modularizing it
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
            for($count = 0; $count < count(json_decode($query_filtered_results_json)) ; $count++){
                echo "<tr>";
                //echo "<input type='hidden' name='action_id[]' value=". $query_filtered_results_json[$count]["id"]  ." />";
                echo "<td>" .$query_filtered_json_array[$count]["client_name"] . "</td>";
                echo "<td>". $query_filtered_json_array[$count]['acc_advocate']."</td>";
                echo "<td>" .$query_filtered_json_array[$count]["sales_assoc"] . "</td>";
                echo "<td>" .$query_filtered_json_array[$count]["start_date"] . "</td>";
                echo "<td>" .$query_filtered_json_array[$count]["program_name"] . "</td>";
                echo "<td>". $query_filtered_json_array[$count]["action_desc"] ."</td>";
                echo "<td>". $query_filtered_json_array[$count]["action_group"] ."</td>";
                echo "<td>". $query_filtered_json_array[$count]["role"] ."</td>";
                echo "<td><select name='status_val[]' id='".$query_filtered_json_array[$count]["id"]. "'>". "<option value='--'>".$query_filtered_json_array[$count]["status"]."</option><option value='working'>working</option>" . "<option value='completed'>completed</option>" . "</select></td>";
                echo "<td><textarea id='". $query_filtered_json_array[$count]["id"] ."' type='text' name='comment'>".$query_filtered_json_array[$count]["comment"]."</textarea></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<hr />";
            echo "<a href='http://marvelousglass.com/actions/inc/action-dashboard.php'> Main Dashboard </a>";
            echo "<a href='http://marvelousglass.com/actions/inc/add-client.php/'> Add Client </a>";
            echo "<a href='http://marvelousglass.com/actions/inc/add-action.php'> Add Action </a>";
            echo "<a href='http://marvelousglass.com/actions/inc/client-action-render.php'> Dashboard 2.0 </a>";
            echo "<hr />";		
		}catch(PDOException $z){
	        	die($z->getMessage());
	   	}
   	}
	
?>