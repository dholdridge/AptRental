<html>
<center><h1>Reminder</h1></center>
<body>
<script>
function popup() {
    alert("The form is not complete");
}
function popup2() {
	alert("Reminder sent successfully");
}
</script>

<form action="" method="post">
Apartment's Number: <input type="text" name="aptno"><br>
Message: Your payment is past due.Please pay immediately
<input type="submit" name="submit" value="Send">
</form>

</body>
</html>
<?php
include 'dbinfo.php' ; 
if (isset($_POST['submit'])) {
    if ( $_POST['aptno'] == "") {
        echo "<script> popup(); </script>";
    } else {
       $con = new mysqli($host,$username,$password,$database);
	   
	   $sql="INSERT INTO REMINDER VALUES(NOW(), 'Your payment is past due.Please pay immediately' , 'Unread', $_POST[aptno])";
	    if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		} 
		if ($con->query($sql) === TRUE) {
			echo "<script>popup2();</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}

		$con->close();

    }
}
?>

