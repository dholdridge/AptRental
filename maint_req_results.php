<?php require('connect_db.php'); ?>
<html>
	<head>
		<title>Request Submitted</title>
	</head>
	<body>
		<?php
			$aptno = 1; //Get current Apt_No
			$issue = $_POST['issueType'];
			$date = "2014-10-01"; //Get current date
			$db = connect_db();
			$query = "insert into MAINTENANCE_REQUEST values('$issueType', '$date', NULL, 'Unresolved', '$aptno');";
			echo $query."\n";
			
			$result = $db->query($query);
			
			if ($result){
				echo "Request has been submitted.";
			} else {
				echo "Sorry, your request cannot be submitted at this time.";
			}
			
			$result->free();
			$db->close()
		?>
	</body>
</html>