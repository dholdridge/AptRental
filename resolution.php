<html>
<center><h1>Service Request Resolution Report</h1></center>
</html>
<?php

include 'dbinfo.php' ; 
$conn=mysqli_connect($host,$username,$password,$database);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Issue_Type,AVG(Time_To_Service) AS Total FROM (SELECT Issue_Type, Date_Resolved - Date_Of_Request + 1 AS Time_To_Service FROM MAINTENANCE_REQUEST WHERE Issue_Status = 'Resolved' AND Date_Of_Request >= '2014-08-01') AS T;";
$sql2 = "SELECT Issue_Type,AVG(Time_To_Service) AS Total FROM (SELECT Issue_Type, Date_Resolved - Date_Of_Request + 1 AS Time_To_Service FROM MAINTENANCE_REQUEST WHERE Issue_Status = 'Resolved' AND Date_Of_Request >= '2014-09-01') AS T;";
$sql3 = "SELECT Issue_Type,AVG(Time_To_Service) AS Total FROM (SELECT Issue_Type, Date_Resolved - Date_Of_Request + 1 AS Time_To_Service FROM MAINTENANCE_REQUEST WHERE Issue_Status = 'Resolved' AND Date_Of_Request >= '2014-10-01') AS T;";
$temp = 1;
$str1 = 'August';
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3); 
echo "<html><table style='width:100%' border = '1'><tr>
				<td>Month</td>
				<td>Type of Request</td> 
				<td>Average No of Days</td>
			</tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if($temp == 1) {
			echo "<tr>
					<td>" . $str1 . "</td>
					<td>" . $row["Issue_Type"] . "</td> 
					<td>" .  $row["Total"] . "</td>
				</tr>";
			$temp++;
		} else { 
			echo "<tr>
					<td></td>
					<td>" . $row["Issue_Type"] . "</td> 
					<td>" .  $row["Total"] . "</td>
				</tr>";
		}
    }
	$temp = 1;
	$str1 = 'September';
	while($row = mysqli_fetch_assoc($result2)) {
		if($temp == 1) {
			echo "<tr>
					<td>" . $str1 . "</td>
					<td>" . $row["Issue_Type"] . "</td> 
					<td>" .  $row["Total"] . "</td>
				</tr>";
			$temp++;
		} else { 
			echo "<tr>
					<td></td>
					<td>" . $row["Issue_Type"] . "</td> 
					<td>" .  $row["Total"] . "</td>
				</tr>";
		}
    }
	$temp = 1;
	$str1 = 'October';
	while($row = mysqli_fetch_assoc($result3)) {
		if($temp == 1) {
			echo "<tr>
					<td>" . $str1 . "</td>
					<td>" . $row["Issue_Type"] . "</td> 
					<td>" .  $row["Total"] . "</td>
				</tr>";
			$temp++;
		} else { 
			echo "<tr>
					<td></td>
					<td>" . $row["Issue_Type"] . "</td> 
					<td>" .  $row["Total"] . "</td>
				</tr>";
		}
    }
	echo "</table></html>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
