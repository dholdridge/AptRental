<html>
<center><h1>Rent Defauter</h1></center>
<form action="" method="post">
Month: <select name="month">
<option value="august">August</option>
<option value="september">September</option>
<option value="december">December</option></select>
<input type="submit" name="submit" value="Submit">
</form>
</html>


<?php
if (isset($_POST['submit'])) {

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
if($_POST['month'] == 'august') {
	$sql = "SELECT n.Apt_No, (n.Amount - m.Rent) AS Extra_Amount_Paid, (n.Date_Of_Payment - STR_TO_DATE(CONCAT('03,',CONVERT(n.Month_Due, CHAR(2)),',',CONVERT(n.Year_Due, CHAR(4))),'%d,%m,%Y')) AS Days_Late FROM APARTMENT m JOIN RENT_PAYMENT n ON n.Apt_No WHERE n.Month_Due = 08 AND n.Year_Due = 2014
";
} else if ($_POST['month'] == 'september') {
$sql = "SELECT n.Apt_No, (n.Amount - m.Rent) AS Extra_Amount_Paid, (n.Date_Of_Payment - STR_TO_DATE(CONCAT('03,',CONVERT(n.Month_Due, CHAR(2)),',',CONVERT(n.Year_Due, CHAR(4))),'%d,%m,%Y')) AS Days_Late FROM APARTMENT m JOIN RENT_PAYMENT n ON n.Apt_No WHERE n.Month_Due = 09 AND n.Year_Due = 2014
";
} else {
$sql = "SELECT n.Apt_No, (n.Amount - m.Rent) AS Extra_Amount_Paid, (n.Date_Of_Payment - STR_TO_DATE(CONCAT('03,',CONVERT(n.Month_Due, CHAR(2)),',',CONVERT(n.Year_Due, CHAR(4))),'%d,%m,%Y')) AS Days_Late FROM APARTMENT m JOIN RENT_PAYMENT n ON n.Apt_No WHERE n.Month_Due = 12 AND n.Year_Due = 2014
";
}
$result = mysqli_query($conn, $sql);
echo "<html><table style='width:100%' border = '1'><tr>
				<td>Apartment</td>
				<td>Extra Amound Paid</td> 
				<td>Defauted By</td>
			</tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			echo "<tr>
					<td>" . $row["Apt_No"] . "</td>
					<td>" . $row["Extra_Amount_Paid"] . "</td> 
					<td>" .  $row["Days_Late"] . "</td>
				</tr>";
			
		
    }
	echo "</table></html>";
} else {
    echo "0 results";
}

mysqli_close($conn);
}
?>
