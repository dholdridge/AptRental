<?php require('connect_db.php'); ?>
<html>
	<head>
		<title>Create Maintenance Request</title>
	</head>
	<body>
		<form action="maint_req_results.php" method="post">
			Apartment Number:
			<input name="aptno" type="text" size="15" />
			<br />
			Issue:
			<select name="issueType" >
			<?php
				// Grab all the issue types
				// And place them in a drop-down menu here
				$db = connect_db();
				$query = "select * from ISSUE;";
				$result = $db->query($query);
				$num_rows = $result->num_rows;
				for ($i=0;$i<$num_rows;$i++) {
					$row = $result->fetch_assoc();
					echo "<option value='".$row['Issue_Type']."'>".$row['Issue_Type']."</option>\n";
				}
				$result->free();
				$db->close();
			?>
			</select>
			<br />
			<input name="submit" type="submit" value="Submit Request" />
		</form>
	</body>
</html>