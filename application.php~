<html>
<body>
<script>
function popup() {
    alert("The form is not complete");
}
function popup2() {
	alert("Application created successfully");
}
</script>

<form action="" method="post">
Name: <input type="text" name="uname"><br>
Birthday: <input type="date" name="birthday"><br>
Gender: <select name="gender">
<option value="M">M</option>
<option value="F">F</option></select><br>
Income: <input type="text" name="income"><br>
Preferred Lease Term: <select name="leaseterm">
<option value="3">3</option>
<option value="6">6</option>
<option value="12">12</option></select><br>
Apartment Category: <select name="apt_cat">
<option value="1bdr-1bth">1bdr-1bth</option>
<option value="2bdr-1bth">2bdr-1bth</option>
<option value="2bdr-2bth">2bdr-2bth</option></select><br>
Preferred Move In Date: <input type="date" name="movein"><br>
Previous Residence: <input type="text" name="prev"><br>
Rent Minimum: <input type="text" name="min"><br>
Rent Maximum: <input type="text" name="max"><br>

<input type="submit" name="submit" value="Create">
</form>

</body>
</html>

<?php
include 'dbinfo.php' ; 
if (isset($_POST['submit'])) {
    if (($_POST['leaseterm'] == "" || $_POST['uname'] == "" || $_POST['birthday'] == "" || $_POST['gender'] == "" || $_POST['income'] == "" || $_POST['apt_cat'] == "" || $_POST['movein'] == "" || $_POST['prev'] == "" || $_POST['min'] == "" || $_POST['max'] == "") {
        echo "<script> popup(); </script>";
    } else {
       $con = new mysqli($host,$username,$password,$database);
	   
	   $sql="INSERT INTO PROSPECTIVE_RESIDENT VALUES(
			'user3',
			'$_POST[uname]',
			'$_POST[birthday]',
			'$_POST[gender]',
			'$_POST[leaseterm]',
			'$_POST[apt_cat]',
			'$_POST[movein]',
			'$_POST[prev]',
			$_POST[income],
			$_POST[min],
			$_POST[max]
		);";
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