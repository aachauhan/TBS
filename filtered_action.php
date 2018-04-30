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
    //PDO open and connect to the databse in a try-catch block
    try{
    $database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $z){
        die($z->getMessage());
    }
    
    //store a uuid in session
    

?>

<?php
    //only run the following code when submit action is pressed to get to this page with $_POST holding all the transfered data
	if(isset($_POST['submit_action'])){
            $an =  $_POST['account_name'];
            //use query to select all the details of a client with name equal to the name user provides on last page
	        try{
		        $query = $database_connection->prepare("SELECT * FROM clients WHERE account_name = '$an'");
		        $query->execute();
	        	$query_fetch = $query->fetchALL(PDO::FETCH_ASSOC);
		        $query_json = json_encode($query_fetch);
		        $another_arr = json_decode($query_json, true);
	        }
	        catch(PDOException $z){
	        	die($z->getMessage());
	        }
		    if(isset($_POST['checked'])){
			    $id_trap = $_POST['id'];
	        	$ar = $_POST['checked'];
    		}
  	}
?>
<title>Filtered Action Dashboard</title>
</head>
        <body>
            <form id="form-create_client" class="form_insert"  method="post" action="/actions/inc/add-action-dashboard.php">
            <h2>Action Dashboard</h2>
        <?php
		//send the account name with input type hidden
		//so we are catching them at one page - the fields
		//send them to the database
		$ar_1 = implode(',', $ar);
		$sql = $database_connection->prepare("SELECT * FROM actions WHERE id IN ({$ar_1})");
		$sql->execute();
		$q_result = $sql->fetchALL(PDO::FETCH_ASSOC);
		$json = json_encode($q_result);
		$someArr = json_decode($json, true);
	        echo "<h3>".$an."</h3>";
	        echo "<label for='date'>Date</label>";
		echo "<input id='date' class='' type='date' name='date' />";
            echo '<input type="hidden" id="acc_name" name="acc_name" value=' . $an . ' />'; //Account Name
        for($i = 0; $i < count(json_decode($query_json)); $i++){
                echo '<input type="hidden" id="sales_assoc" name="sales_associate" value=' . $another_arr[$i]['sales_associate'] . ' />'; //Sales Advocate
                echo '<input type="hidden" id="acc_advocate" name="acc_advocate" value=' . $another_arr[$i]['acc_advocate'] . ' />'; //Account Advocate
                echo '<input type="hidden" id="acc_strtdate" name="acc_strtdate" value=' . $another_arr[$i]['acc_strtdate'] . ' />'; //Account Start Date
                //
        }
		echo "<table border='1'>";
		echo "<tr>
		         <th>Program Name</th>
		         <th>Action Description</th>
		         <th>Action Group</th>
		         <th>Action Role</th>
		         <th>Action Cost</th>
		         <th>Is Dependent</th>
		         <th>Dependent's Id</th>
		 </tr>";
		 for($count = 0; $count < count(json_decode($json)) ; $count++){
             echo "<tr>";
             echo '<input type="hidden" id="id" name="action_id[]" value=' . $someArr[$count]['id'] . ' />';
		     echo "<td>" .$someArr[$count]["program_name"] . "</td>";
		     echo "<td>". $someArr[$count]["action_desc"] ."</td>";
		     echo "<td>". $someArr[$count]["action_group"] ."</td>";
		     echo "<td>". $someArr[$count]["action_role"] ."</td>";
		     echo "<td>". $someArr[$count]["action_cost"] ."</td>";
		     echo "<td>". $someArr[$count]["is_dependent"] ."</td>";
		     echo "<td>". $someArr[$count]["dependents_id"] ."</td>";
		     echo "</tr>";
		 }
		 echo "</table>";
		?>
		<input type="hidden" id="action_random" name="action_random" value="true" />
        <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
</form>
<!-- HTML COMMENT -->
</body>
</html>