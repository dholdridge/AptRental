<?php require('connect_db.php'); ?>

<html>
	<head>
		<title>Application Review</title>
	</head>
	<body>
		<table>
			<tr>
				<td>Name</td>
				<td>Date of Birth</td>
				<td>Gender</td>
				<td>Monthly Income ($)</td>
				<td>Type of Apartment Requested</td>
				<td>Preferred move-in date</td>
				<td>Lease Term</td>
				<td>Reject/Accept</td>
				<td></td>
			</tr>
			<form action="apt_allotment.php" method="post">
			<?php
				$db = connect_db();
				$query = "select * from PROSPECTIVE_RESIDENT";
				$result = $db->query($query);
				$num_result = $result->num_rows;
				
				for ($i=0;$i<$num_result;$i++) {
					$row = $result->fetch_assoc();
					echo "<tr>\n";
					echo "<td>".$row['Prospect_Name']."</td>\n";
					echo "<td>".$row['Date_Of_Birth']."</td>\n";
					echo "<td>".$row['Gender']."</td>\n";
					echo "<td>".$row['Monthly_Income']."</td>\n";
					echo "<td>".$row['Required_Category']."</td>\n";
					echo "<td>".$row['Pref_Move_In_Date']."</td>\n";
					echo "<td>".$row['Pref_Lease_Term']."</td>\n";
					/* Determine if the user is accepted (in the RESIDENT table) or rejected */
					$AcceptResult = $db->query("select * from RESIDENT where Resident_Name like '".$row['Prospect_Name']."' and Date_Of_Birth like '".$row['Date_Of_Birth']."';";
					$IsAccepted = "Unprocessed";
					$num = $AcceptResult->num_rows;					
					if ($num > 0) {
						$IsAccepted = "Accepted";
					}
					echo "<td>$IsAccepted</td>\n"; //Whether the application is accepted or rejected
					echo "<td>";
					if (1){ //Place a radio button here if application is accepted
						echo "<input type='radio' name='user' value='".$row['Username']."' />";
					}
					echo "</td>\n"; 
					echo "</tr>\n";
				}
				$result->free();
				$db->close();
			?>
		</table>
		<input name="Submit" type="submit" value="Next">
		</form>
	</body>
</html>
