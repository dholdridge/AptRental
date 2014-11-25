<html>
<body> 
 
<?php
$con = mysql_connect("","","");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("cis_id", $con);
$sql="INSERT INTO REMINDER VALUES(NOW(), "Your payment is past due. Please pay immediately.", "Unread", $_POST[aptno])";
 
if (!mysql_query($sql,$con)) {
  die('Error: ' . mysql_error());
}

echo "A reminder has been sent to Apartment". $_POST[aptno];
 
mysql_close($con)

?>
</body>
</html>