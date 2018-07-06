<?php

    //header.php contains the html structure for the page
    require '/home4/amasyn/public_html/marvelousglass.com/actions/inc/header.php';
    
    //database info
    //can be modularized
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
<title>Action Dashboard</title>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</head>
        <body>
        <!-- Menu Section -->
		<a href="http://marvelousglass.com/actions/inc/action-dashboard.php">Main Dashboard</a>
		<a href="http://marvelousglass.com/actions/inc/add-client.php/">Add Client</a>
		<a href="http://marvelousglass.com/actions/inc/add-action.php">Add Action</a>
		<a href="http://marvelousglass.com/actions/inc/client-action-render.php">Dashboard 2.0</a>
        <hr />

        <h2>Action Dashboard</h2>
        <p>On this page, map the clients with actions</p>
        
        <!--form to submit the mapping into table-->
        <form id="form-create_client" class="form_insert"  method="post" action="/actions/inc/filtered-action-dashboard.php">
        <label class="description" for="client_name">Enter Client Name : </label>
        <!--use of JS below to activate checkboxes-->
        <select name="account_name" id="client_dd" onchange="render_checkboxes()">
            <?php
                //empty array
                $json_trap = []; //keeps the array
                $sql = mysqli_query($con, "SELECT * FROM clients");
                echo "<option value='default'>--</option>";
                while ($row = $sql->fetch_assoc()){
                    echo "<option name=\"client_name\" value=\"". $row['account_name'] . "\">" . $row['account_name'] . "</option>";
                    $key = $row['account_name'];
                    $json_trap[$key] = $row['saved_actions'];
                }
                // - JSON trap is storing the data, its storing the saved actions
                print_r($json_trap);
                $converted_json = json_encode($json_trap);
                print_r($converted_json);    
            ?>
        </select>
        <!-- the Select tag above is showing the dropdown options wtih clients -->
    <?php
		// bring actions from database
        $query_1 = $database_connection->prepare("SELECT * FROM actions");
                
                $query_1->execute();
                $q_result = $query_1->fetchAll(PDO::FETCH_ASSOC);
                
                $json = json_encode($q_result);
		$someArr =  json_decode($json, true);
				
        echo "<table border='1'>";
        echo "<tr>
                <th>Action</th>
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
            echo "<td>". "<input class='action_checkbox' id='" . $someArr[$count]["id"] ."' name='checked[]' type='checkbox' value='" . $someArr[$count]["id"] ."'>" ."</td>";
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
        <input id="saveForm" class="button_text" type="submit" name="submit_action" value="Submit" />
</form>
<script>
    $("tr").on("click", "input", function() {
        console.log(this.id);
    });
    var id_arr = <?php echo $converted_json ?>;
    console.log(id_arr.toString());
    function reset(){
        var x = document.getElementsByClassName('action_checkbox');
        for(var i = 0; i < x.length; i++){
            x[i].checked = false;
        }
    }
    function render_checkboxes() {
        //reset all checkboxes
        reset();
        //document.getElementById();
        var selected_optn = document.getElementById("client_dd").value;
        if(selected_optn != "--"){
            var id_selected = id_arr[selected_optn];
            var id_selected_arr = id_selected.split(','); //convert comma seperated values into array
            for(var i = 0; i < id_selected_arr.length; i++){
                id_selected_arr[i] = id_selected_arr[i].replace(/^\s*/, "").replace(/\s*$/, "");
                document.getElementById(id_selected_arr[i]).checked = true;
                //console.log(id_selected_arr[i]);
        }// loop through array
        // and marks checkboxes to be seleceted addition to the comment
        }
    }
</script>
<?php

    if(isset($_POST['submit'])){
        $contentURL = file_get_contents("http://marvelousglass.com/actions/inc/action-dashboard.php");
        $DOM = new DOMDocument();
        $DOM->loadHTML($contentURL);
        $header = $DOM->getElementsByTagName('th');
		$detail = $DOM->getElementsByTagName('td');
		
		$checkbox = $DOM->getElementsByTagName('input');
		if(isset($_POST['checked'])){
			print_r($_POST['checked']);
		}
		for($i = 0; $i < $checkbox->length; $i++){
		}
        echo 'clicked';
        $an = $_POST['account_name'];
        if (isset($_POST['checked'])){
            echo "Checked";
            echo $an;
        }
        print_r($_POST);
    }
?>
</body>
</html>