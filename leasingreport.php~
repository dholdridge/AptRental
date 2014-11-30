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

$sql = "SELECT CATEGORY, COUNT(*) AS Total FROM APARTMENT WHERE Available_On > '2014-08-01' GROUP BY CATEGORY;";
$sql2 = "SELECT CATEGORY, COUNT(*) AS Total FROM APARTMENT WHERE Available_On > '2014-09-01' GROUP BY CATEGORY;";
$sql3 = "SELECT CATEGORY, COUNT(*) AS Total FROM APARTMENT WHERE Available_On > '2014-10-01' GROUP BY CATEGORY;";
$temp = 1;
$str1 = 'August';
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3); 
echo "<html><table style='width:100%' border = '1'><tr>
				<td>Month</td>
				<td>Category</td> 
				<td>No of Apartment</td>
			</tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if($temp == 1) {
			echo "<tr>
					<td>" . $str1 . "</td>
					<td>" . $row["CATEGORY"] . "</td> 
					<td>" .  $row["Total"] . "</td>
				</tr>";
			$temp++;
		} else { 
			echo "<tr>
					<td></td>
					<td>" . $row["CATEGORY"] . "</td> 
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
					<td>" . $row["CATEGORY"] . "</td> 
					<td>" .  $row["Total"] . "</td>
				</tr>";
			$temp++;
		} else { 
			echo "<tr>
					<td></td>
					<td>" . $row["CATEGORY"] . "</td> 
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
					<td>" . $row["CATEGORY"] . "</td> 
					<td>" .  $row["Total"] . "</td>
				</tr>";
			$temp++;
		} else { 
			echo "<tr>
					<td></td>
					<td>" . $row["CATEGORY"] . "</td> 
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