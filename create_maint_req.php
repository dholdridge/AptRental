<html>
	<head>
		<title>Create Maintenance Request</title>
	</head>
	<body>
		<form action="main_req_results.php" method="post">
			Apartment Number:
			<input name="aptno" type="text" size="15" />
			<br />
			Issue:
			<?php
				// Grab all the issue types
				// And place them in a drop-down menu here
			?>
			<input name="submit" type="submit" value="Submit Request" />
		</form>
	</body>
</html>