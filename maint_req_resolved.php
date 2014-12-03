<?php require('connect_db.php'); ?>
<html>
	<head>
		<title>Title</title>
	</head>
	<body>
		<?php
			$key = $_POST['key'];
			$key_values = explode(';', $key);
			$aptno = $key_values[0];
			$issue = $key_values[1];
			$date = $key_values[2];
			
			$db = connect_db();
			date_default_timezone_set("America/New_York");
			$now= date("Y-m-d");
			$query = "update MAINTENANCE_REQUEST set Issue_Status = 'Resolved' and Date_Resolved = '$now' where Apt_No like '$aptno' and Issue_Type like '$issue' and Date_Of_Request like '$date';";
			echo $query."\n";
			$result = $db->query($query);
			if ($result){
				echo "Request has been resolved.";
			} else {
				echo "Sorry, this request cannot be resolved at this time.";
			}
			
			$result->free();
			$db->close();
		?>
	</body>
</html>
