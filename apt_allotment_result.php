<?php require('connect_db.php'); ?>
<html>
	<head>
		<title>Title</title>
	</head>
	<body>
		<?php
		/*Prospect becomes resident
		Apt Availability = Move-in + Lease term
		*/
		$explodeARray = explode(';', $_POST['key'])
		$aptno = $explodeArray[0];
		$username = $explodeArray[1];
	/*	$resname = $_POST[''];
		$aptno = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];   */

		$db = connect_db();
		$addRes = "insert into RESIDENT values('$username', '$resname', '$dob', '$aptno');";
		$getApt = "select * from APARTMENT where Apt_No like '$aptno';";
		$Apt = $db->query($getApt);
		$A = $Prosp-> fetch_assoc();
		$currentDate = date("Y-m-d");
		$lease = $A['Lease_Term'];
		$AvailDate = $currentDate + strtotime("+$lease months");
		echo $AvailDate;
		$updateApt = "update APARTMENT set Availabile_On = '$AvailDate' where Apt_No = '$aptno';";
		$addResult = $db->query($addRes);
		$updateResult = $db->query($updateApt);
		
		if ($addResult && $updateResult) {
			echo "Apartment assigned.";
		} else {
			echo "Apartment couldn't be assigned at this time.";
		}
		

		$addResult->free();
		$updateResult->free();
		$Prosp
		$db->close();
		?>
	</body>
</html>
