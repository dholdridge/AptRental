<?php require('connect_db.php'); ?>

<html>
	<head>
		<title>View Maintenance Requests</title>
	</head>
	<body>
		<form action="maint_req_resolved.php" method="post" >
			<table>
				<tr>
					<td>Date of Request</td>
					<td>Apt No</td>
					<td>Description of Issue</td>
					<td></td>
				</tr>
				<?php 
					$db = connect_db();
					$query = "select * from MAINTENANCE_REQUEST where Issue_Status = 'Unresolved';";
					$result = $db->query($query);
					$num_rows = $db->$result->num_rows;
					for ($i=0;$i<$num_rows;$i++) {
						$row = $result->fetch_assoc();
						echo "<tr>\n";
						echo "<td>".$row['Date_Of_Request']."</td>\n";
						echo "<td>".$row['Apt_No']."</td>\n";
						echo "<td>".$row['Issue_Type']."</td>\n";
						echo "<input type='check' name = 'aptno' value='".$row['Apt_No']."' /></td>\n";
						echo "</tr>\n";
					}
					$result->free();
					$db->close();
				?>
			</table>
			<input type='submit' name='resolved' value='Resolved' /> 
		</form>
			<p>Resolved Issues</p>
			<table>
				<tr>
					<td>Date of Request</td>
					<td>Apt No</td>
					<td>Description of Issue</td>
					<td>Issue Resolved On</td>
				</tr>
				<?php 
					$db = connect_db();
					$query = "select * from MAINTENANCE_REQUEST where Issue_Status = 'Resolved';";
					$result = $db->query($query);
					$num_rows = $db->$result->num_rows;
					for ($i=0;$i<$num_rows;$i++) {
						$row = $result->fetch_assoc();
						echo "<tr>\n";
						echo "<td>".$row['Date_Of_Request']."</td>\n";
						echo "<td>".$row['Apt_No']."</td>\n";
						echo "<td>".$row['Issue_Type']."</td>\n";
						echo "<td>".$row['Date_Resolved']."</td>\n";
						echo "</tr>\n";
					}
					$result->free();
					$db->close();
				?>
			</table>
	</body>
</html>