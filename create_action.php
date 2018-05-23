<?php

require '/home4/amasyn/public_html/marvelousglass.com/actions/inc/header.php';
//database info
$servername = "localhost";
$username = "amasyn_local";
$password = "Cogimetrics100";
$dbname = "amasyn_actions_db";


try{
$database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['submit'])){
	$program_name = $_POST['prog_name'];
	$action_description = $_POST['action_description'];
	$action_role = $_POST['action_role'];
	$action_cost = $_POST['action_cost'];
	$action_group = $_POST['action_group'];
	$is_dependent = $_POST['is_dependent'];
	$dependents_id = $_POST['dependents_id'];
	
	$sql = "INSERT INTO actions (program_name, action_desc, action_group, action_role, action_cost, is_dependent, dependents_id)
	VALUES ('$program_name', '$action_description', '$action_group', '$action_role', '$action_cost', '$is_dependent', '$dependents_id')";

	if($database_connection->exec($sql)){
		echo "NEW RECORD ADDED";
	}
	else {
		echo "unsuccessful";
	}
	
	
}
}catch(PDOException $z){

die($z->getMessage());

}
?>

        <body>
            <form id="form-create_client" class="form_insert"  method="post" action="<?php htmlentities($_SERVER['PHP_SELF']); ?>">
                    <div class="form_description">
                <h2>Add Action Form</h2>
            </div>						
                <ul>
                
                        <li id="li_1" >
            <label class="description" for="prog_name">ENTER PROGRAM NAME</label>
            <div>
                <input id="element_1" name="prog_name" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>		<li id="li_3" >
            <label class="description" for="action_description">ENTER ACTION DESCRIPTION</label>
            <div>
                <input id="element_3" name="action_description" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>		<li id="li_2" >
            <label class="description" for="action_role">ENTER ACTION ROLE</label>
            <div>
                <input id="element_2" name="action_role" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
			</li>
			<li id="li_4" >
            <label class="description" for="action_cost">ENTER ACTION COST</label>
            <div>
                <input id="element_4" name="action_cost" class="element text medium" type="text" maxlength="255" value=""/> 
			</div> 
			</li>
			<li >
            <label class="description" for="action_group">ENTER ACTION GROUP</label>
            <div>
                <input id="element_4" name="action_group" class="element text medium" type="text" maxlength="255" value=""/> 
			</div> 
			</li>
			<li id="li_5" >
				<label class="description" for="is_dependent">IS DEPENEDENT? Yes or No</label>
				<div>
					<input id="element_4" name="is_dependent" class="element text medium" type="text" maxlength="255" value=""/> 
				</div> 
			</li>
			<li id="li_6" >
				<label class="description" for="dependents_id">DEPENDENTS ID</label>
				<div>
					<input id="element_4" name="dependents_id" class="element text medium" type="text" maxlength="255" value=""/> 
				</div> 
			</li>
                    <li class="buttons">
					<input type="hidden" name="form_id" value="1737" />
					<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
            </li>
				</ul>		
			</form>
			<?php
				try{
					$database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
					$database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					}catch(PDOException $z){
			
					die($z->getMessage());
				}
			?>
			<hr />
		<a href="http://marvelousglass.com/actions/inc/action-dashboard.php">Main Dashboard</a>
		<a href="http://marvelousglass.com/actions/inc/add-client.php/">Add Client</a>
		<a href="http://marvelousglass.com/actions/inc/add-action.php">Add Action</a>
		<a href="http://marvelousglass.com/actions/inc/client-action-render.php">Dashboard 2.0</a>
</body>
</html>