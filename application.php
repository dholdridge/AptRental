<html>
<center><h1>Prospective Resident Application Form</h1></center>
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
Income: <input type="number" name="income"><br>
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
Rent Minimum: <input type="number" name="min"><br>
Rent Maximum: <input type="number" name="max"><br>

<input type="submit" name="submit" value="Apply">
</form>

</body>
</html>

<?php
include 'dbinfo.php' ; 
include 'newUser.php';

if (isset($_POST['submit'])) {
    if (empty($_POST['uname']) || empty($_POST['birthday']) || empty($_POST['income']) || empty($_POST['movein']) || empty($_POST['prev']) || empty($_POST['min']) || empty($_POST['max']))) {
        echo "No fields may be left blank. Please fill in all fields and try again.";
    } else {
       $con = new mysqli($host,$username,$password,$database);
	   
	   $sql="INSERT INTO PROSPECTIVE_RESIDENT VALUES(
			$Uname,
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
