<html>
<body> 
 
<?php
$con = mysql_connect("","","");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("cis_id", $con);
$sql="INSERT INTO PROSPECTIVE_RESIDENT VALUES(
	$username,
	$_POST[aptno],
	$_POST[birthday],
	$_POST[gender],
	$_POST[income],
	$_POST[leaseterm],
	$_POST[apt_cat],
	$_POST[movein],
	$_POST[prev],
	$_POST[min],
	$_POST[max]
);";
 
if (!mysql_query($sql,$con)) {
  die('Error: ' . mysql_error());
}

echo "A application has been created.";
 
mysql_close($con)

?>
</body>
</html>