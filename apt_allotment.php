<?php require('connect_db.php'); ?>
<html>
	<head>
		<title>Apartment Allotment</title>
	</head>
	<body>
		Applicant Name: 
		<br />
		Apartment Availability
		<table>
			<tr>
				<td>Apartment No.</td>
				<td>Category</td>
				<td>Monthly Rent ($)</td>
				<td>Sq Ft.</td>
				<td>Available from</td>
				<td></td>
			</tr>
			<form action="apt_allotment_result.php" method="post">
			<?php
				$db = connect_db();
				$username = $_POST['user'];
				$query = "select * from APARTMENT"; //TODO: fix statement
				$result = $db->query($query);
				$num_rows = $result->num_rows;
				
				for ($i=0;$i<$num_rows;$i++) {
					$row = $result->fetch_assoc();
					echo "<tr>\n";
					echo "<td>".$row['Apt_No']."</td>\n";
					echo "<td>".$row['Category']."</td>\n";
					echo "<td>".$row['Rent']."</td>\n";
					echo "<td>".$row['Square_Feet']."</td>\n";
					echo "<td>".$row['Available_On']."</td>\n";
					$key = $row['Apt_No'].';'.$username;
					echo "<td><input type='radio' name='key' value='".$key."' /></td>\n";
					echo "</tr>\n";
				}
				$result->free();
				$db->close();
			?>
			<input type="submit" name="assign" value="Assign Apartment" />
		</form>
	</body>
</html>
