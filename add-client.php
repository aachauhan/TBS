<?php

        require '/home4/amasyn/public_html/marvelousglass.com/actions/inc/header.php';
        //database info
        $servername = "localhost";
        $username = "amasyn_local";
        $password = "Cogimetrics100";
        $dbname = "amasyn_actions_db";


        if(isset($_POST['submit'])){
            $account_name = $_POST['account_name'];
            $contact_email = $_POST['contact_email'];
            $contact_phone = $_POST['contact_phone'];
            $acc_strtdate = $_POST['acc_strtdate'];
            $sales_associate = $_POST['sales_associate'];
            $acc_advocate = $_POST['acc_advocate'];
            $bill_amt = $_POST['bill_amt'];
            
        }

        try{
        $database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['submit'])){
            $account_name = $_POST['account_name'];
            $contact_email = $_POST['contact_email'];
            $contact_phone = $_POST['contact_phone'];
            $acc_strtdate = $_POST['acc_strtdate'];
            $sales_associate = $_POST['sales_associate'];
            $acc_advocate = $_POST['acc_advocate'];
            $bill_amt = $_POST['bill_amt'];
            
            $sql = "INSERT INTO clients (account_name, contact_email, contact_phone, acc_strtdate, sales_associate, acc_advocate, bill_amt)
            VALUES ('$account_name', '$contact_email', '$contact_phone', '$acc_strtdate', '$sales_associate', '$acc_advocate', '$bill_amt')";

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

  <title>Add Client</title>
</head>
        <body>
            <form id="form-create_client" class="form_insert"  method="post" action="<?php htmlentities($_SERVER['PHP_SELF']); ?>">
                    <div class="form_description">
                <h2>Add Client Form</h2>
            </div>						
                <ul>
                
                        <li id="li_1" >
            <label for="account_name">Enter Account Name</label>
            <div>
                <input id="element_1" name="account_name" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>		<li id="li_3" >
            <label for="contact_email">Enter Contact Name</label>
            <div>
                <input id="element_3" name="contact_email" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>		<li id="li_2" >
            <label for="contact_phone">Enter Contact Phone Number</label>
            <div>
                <input id="element_2" name="contact_phone" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>		<li id="li_4" >
            <label class="description" for="contact_email">Enter Email</label>
            <div>
                <input id="element_4" name="contact_email" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>            <li id="li_6" >
            <label class="description" for="acc_strtdate">Enter Account Start Date</label>
            <div>
                <input id="element_6" name="acc_strtdate" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>            <li id="li_7" >
            <label class="description" for="sales_associate">Enter Sales Associates Name</label>
            <div>
                <input id="element_7" name="sales_associate" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>            <li id="li_8" >
            <label class="description" for="acc_advocate">Enter Account Advocate Name</label>
            <div>
                <input id="element_8" name="acc_advocate" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>           <li id="li_9" >
            <label class="description" for="bill_amt">Enter Billing Amount</label>
            <div>
                <input id="element_8" name="bill_amt" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
            </li>
                    <li class="buttons">
                    <input type="hidden" name="form_id" value="1737" />
                    <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
            </li>
                </ul>
</form>
		        <hr />
                <a href="http://marvelousglass.com/actions/inc/action-dashboard.php">Main Dashboard</a>
		        <a href="http://marvelousglass.com/actions/inc/add-client.php/">Add Client</a>
		        <a href="http://marvelousglass.com/actions/inc/add-action.php">Add Action</a>
		        <a href="http://marvelousglass.com/actions/inc/client-action-render.php">Dashboard 2.0</a>
        
</body>
</html>