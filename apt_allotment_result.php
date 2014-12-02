<?php require('connect_db.php'); ?>
<html>
	<head>
		<title>Title</title>
	</head>
	<body>
		<?php
		date_default_timezone_set("America/New_York");
		/*Prospect becomes resident
		Apt Availability = Move-in + Lease term
		*/
		$explodeArray = explode(';', $_POST['key'])
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
		
		$ResResult = $db->query("select * from PROSPECTIVE_RESIDENT where Username like '$username';");
        $AptResult = $db->query("select * from APARTMENT where Apt_No like '$aptno';");
        $Apt = $AptResult-> fetch_assoc();
        $Res = $ResResult->fetch_assoc();
        $resname = $Res['Prospect_Name'];
        $dob = $Res['Date_Of_Birth'];
        $addResQuery = "insert into RESIDENT values('$username', '$resname', '$dob', '$aptno');";
		$currentDate = date("Y-m-d");
		$lease = $Apt['Lease_Term'];
		$AvailDate = $currentDate + strtotime("+$lease months");
		echo $AvailDate;
		$updateAptQuery = "update APARTMENT set Availabile_On = '$AvailDate' where Apt_No = '$aptno';";
		$addResult = $db->query($addResQuery);
		$updateResult = $db->query($updateAptQuery);
		
		if ($addResult && $updateResult) {
			echo "Apartment assigned.";
		} else {
			echo "Apartment couldn't be assigned at this time.";
		}
		

		$addResult->free();
		$updateResult->free();
		$AptResult->free();
		$ResResult->free();
		$db->close();
		?>
	</body>
</html>
