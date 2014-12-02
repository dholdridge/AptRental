<?php require('connect_db.php'); ?>

<html>
	<head>
		<title>Rent</title>
	</head>
	<body>
		<form action="rent_result.php" method="post">
			Date: 
				<select name="date"> <!-- Populate the drop-down -->
				</select>
			<br />
			Apartment No:
				<input type="text" name="aptno" />
				<br />
			Rent for Month: <!-- Two drop-down -->
				<select name="rentMonth">
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
				</select>
				<select name="rentYear">
					<option value="2014">2014</option>
				</select>
				<br />
			Amount Due:
				<input type="text" name="amount" />
				<br />
			User Card:
				<select name="card">
					<?php
						session_start();
						
						$username = $_SESSION['loginName'];
						echo $username;
						$db = connect_db();
						$query = "select Card_No from PAYMENT_INFORMATION where Username like '".$username."';";
						$result = $db->query($query);
						$num_rows = $result->num_rows;
						for ($i=0;$i<$num_rows;$i++) {
							$row = $result->fetch_assoc();
							echo "<option value='".$row['Card_No']."'>".$row['Card_No']."</option>\n";
						}
						$result->free();
						$db->close();
					?>
				</select>
			<input type="submit" name="pay" value="Pay" />
		</form>
	</body>
</html>
