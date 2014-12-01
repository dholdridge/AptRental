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
		$aptno = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];
		$ = $_POST[''];

		$db = connect_db();
		$addRes = "insert into RESIDENT values();";
		$updateApt = "update APARTMENT set Availabile_On = '' where Apt_No = '$aptno';	
		$addResult = $db->query($addRes);
		$updateResult = $db->query($updateApt);
		

		$addResult->free();
		$updateResult->free();
		$db->close();
		?>
	</body>
</html>
