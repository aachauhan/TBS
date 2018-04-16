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

    try{
    
    $database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $z){
    
        die($z->getMessage());
    
    }
?>

<?php
	if(isset($_POST['submit_action'])){
		//echo "here";
	        $an =  $_POST['account_name'];
	        try{
		        $query = $database_connection->prepare("SELECT * FROM clients WHERE account_name = '$an'");
		        $query->execute();
	        	$query_fetch = $query->fetchALL(PDO::FETCH_ASSOC);
		        $query_json = json_encode($query_fetch);
		        $another_arr = json_decode($query_json, true);
		        //echo $query_json['sales_associate'];
	        	//print_r($query_json);
	        }
	        catch(PDOException $z){
	        	die($z->getMessage());
	        }
	        
	        //$id = $_POST['id'];
	        //echo $an;
		if(isset($_POST['checked'])){
			$id_trap = $_POST['id'];
	        	$ar = $_POST['checked'];
	        	//print_r($ar);
	        	//get sales associate, advocate
	        	//
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
        	echo '<input type="hidden" id="acc_name" name="acc_name" value=' . $an . ' />';
		
			// // bring actions from database
		// $query_1 = $database_connection->prepare("SELECT * FROM actions");
		        
		//         $query_1->execute();
		//         $q_result = $query_1->fetchAll(PDO::FETCH_ASSOC);
		        
		//         $json = json_encode($q_result);
			// 		$someArr =  json_decode($json, true);
			// comment about passing values to the next page
					
			// 		//print_r($someArr);
			
			//one way can be bringing the value of actions from the ids on next page
			//so in other words we have client details already on this page
			//all we need next is the details of the actions on next page - can be brought by using the ids
			// so my code was only bringing one word from the given sentence via POST - This was fixed when I fixed the eroors with 
			//and this require a change in our approach for the solution
			//these values - IO/OI
			
			
			
		        
		
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
		     echo '<input type="hidden" id="program_name" name="program_name" value="' . $someArr[$count]['program_name'] . '" />';
		     echo "<td>". $someArr[$count]["action_desc"] ."</td>";
		     echo '<input type="hidden" id="action_desc" name="action_desc" value="' . $someArr[$count]['action_desc'] . '" />';
		     echo "<td>". $someArr[$count]["action_group"] ."</td>";
		     echo '<input type="hidden" id="action_group" name="action_group" value="' . $someArr[$count]['action_group'] . '" />';
		     echo "<td>". $someArr[$count]["action_role"] ."</td>";
		     echo '<input type="hidden" id="action_role" name="action_role" value="' . $someArr[$count]['action_role'] . '" />';
		     echo "<td>". $someArr[$count]["action_cost"] ."</td>";
		     echo "<td>". $someArr[$count]["is_dependent"] ."</td>";
		     echo "<td>". $someArr[$count]["dependents_id"] ."</td>";
		     echo "</tr>";
		 }
		 echo "</table>";
			for($i = 0; $i < count(json_decode($query_json)); $i++){
	        		echo '<input type="hidden" id="sales_assoc" name="sales_associate" value=' . $another_arr[$i]['sales_associate'] . ' />';
	        		echo '<input type="hidden" id="acc_advocate" name="acc_advocate" value=' . $another_arr[$i]['acc_advocate'] . ' />';
	        	}
		?>
		
        <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
</form>
<!-- HTML COMMENT -->
<!-- ONLY FIRST WORD IS COMING FROM THE POST -->
</body>
</html>