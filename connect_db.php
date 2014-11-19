<?php 
	function connect_db() {
		@ $db = new mysqli('academic-mysql.cc.gatech.edu', 'cs4400_Group_56', 'TZnYYMN9', 'cs4400_Group_56')
		if (mysqli_connect_errno() ) {
			echo "Error: couldn't connect to database";
			exit;
		}
		return db;
	}
	
	/* Test the function */
	$db = connect_db();
	$query = "select * from RESIDENT";
	$result = $db->query($query);
	$num_results = $result->num_rows;
	
	for ($i=0;i<$num_results;i++) {
		$row = $result->fetch_assoc();
		echo "$row['Username'], $row['Resident_Name'], $row['Date_Of_Birth'], $row['Apt_No']<br \>";
	}
	$result->free()
	$db->close()
	?>