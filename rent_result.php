<?php require('connect_db.php'); ?>
<html>
	<head>
		<title>Title</title>
	</head>
	<body>
		<?php
			date_default_timezone_set("America/New_York");
			$date = date("Y-m-d");
			//$date = $_POST['date'];
			$amount = $_POST['amount'];
			$aptno = $_POST['aptno'];
			$month = $_POST['rentMonth'];
			$year = $_POST['rentYear'];
			$card = $_POST['card'];

			$db = connect_db();
			$query = "insert into RENT_PAYMENT values('$date', '$amount', '$aptno', '$month', '$year', '$card');";
			$result = $db->query($query);
			if ($result) {
				echo "Your rent payment has been processed.";
			} else {
				echo "Sorry, your payment could not be completed at this time.";
			}
			$result->free();
			$db->close();
		?>		
	</body>
</html>
