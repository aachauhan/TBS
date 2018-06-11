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
        }catch(PDOException $z){

        die($z->getMessage());

        }

        if(isset($_POST['submit'])){
            echo 'clicked';
            echo $_POST['checked'];
        }

        
?>
<title>Create Client</title>
</head>
        <body>
            <form id="form-create_client" class="form_insert"  method="post" action="<?php htmlentities($_SERVER['PHP_SELF']); ?>">
                    <div class="form_description">
                <h2>Add Client Form</h2>
            </div>						
                <ul>
                
                        <li id="li_1" >
            <label class="description" for="client_name">Enter Client Name </label>
            <div>
                <input id="element_1" name="client_name" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>		<li id="li_3" >
            <label class="description" for="start_date">Enter Start Date</label>
            <div>
                <input id="element_3" name="start_date" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>		<li id="li_2" >
            <label class="description" for="sales_rep">Enter Sales Rep Name</label>
            <div>
                <input id="element_2" name="sales_rep" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>		<li id="li_4" >
            <label class="description" for="acc_advocate">Enter Advocate</label>
            <div>
                <input id="element_4" name="acc_advocate" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>
            <li  >
            <label class="description" for="acc_comment">Enter Comments:</label>
            <div>
                <textarea id="element_4" name="acc_comment" class="element text medium" type="text" maxlength="255" value=""> </textarea>
            </div> 
            </li>
                    <li class="buttons">
                    <input type="hidden" name="form_id" value="1737" />
                    
                    <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
            </li>
                </ul>		
    <?php
        $query = $database_connection->prepare("SELECT * FROM actions");
                
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $json = json_encode($results);
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
            echo "<td>". "<input id='checkBox' name='checked' type='checkbox'>" ."</td>";
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


        // if (count(json_decode($json)) {
        //     // Open the table
        //     echo "<table>";

        //     // Cycle through the array
            //  foreach ($json->data as $mydata) {
            //         echo $mydata->name . "\n";
            //         foreach($mydata->values){
            //             echo $values->value . "\n";
            //         }
            // }
        //         echo "<tr>";
        //         echo "<td>$stand->program_name</td>";
        //         echo "<td>$stand->action_desc</td>";
        //         echo "</tr>";
        //     }

        //     // Close the table
        //     echo "</table>";
        // }
        ?>
</form>
</body>
</html>