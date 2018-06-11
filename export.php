<?php
  //database info
    $servername = "localhost";
    $username = "amasyn_local";
    $password = "Cogimetrics100";
    $dbname = "amasyn_actions_db";

	$database_connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
	$database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query_filtered = $database_connection->prepare("SELECT * FROM client_actions");
	$query_filtered->execute();
	$query_filtered_results = $query_filtered->fetchAll(PDO::FETCH_ASSOC);
	
	$con = mysqli_connect($servername, $username, $password, $dbname);

    	if(mysqli_connect_errno()){
        	echo "Failed to connect to MySQL: " . mysqli_connect_error();
   	}
   	
   	$query = "SELECT * FROM client_actions";
   	if (!$result = mysqli_query($con, $query)) {
   		exit(mysqli_error($con));
   	}
   	
   	$data = array();
   	if (mysqli_num_rows($result) > 0) {
    		while ($row = mysqli_fetch_assoc($result)) {
        		$data[] = $row;
    		}
	}
	
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	$output = fopen('php://output', 'w');
	fputcsv($output, array('aID', 'Account Advocate', 'Client Name', 'Sales Associate', 'Start Date', 'Program Name', 'Action Description', 'Action Group', 'Role', 'Action Id', 'Status', 'Comment'));
 
	if (count($data) > 0) {
    		foreach ($data as $row) {
        		fputcsv($output, $row);
    		}
	}

?>