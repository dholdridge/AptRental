<?php require('connect_db.php'); ?>
<html>
	<head>
		<title>Title</title>
	</head>
	<body>
		<?php
			$name = $POST['cardholder'];
			$num = $POST['cardnumber'];
			$exp = $POST['expdate'];
			$cvv = $POST['cvv'];
			$user = "user1"; // Get the current user
			if (! $name || ! $num || ! $exp || ! $cvv) {
				echo "You didn't fill out all of the required information. Please try again.";
				exit;
			}
			
			$db = connect_db();
			$query = "insert into PAYMENT_INFORMATION values($num, $cvv, $name, $user, $exp);";
			echo $query;
			
			/*
			$result = $db->query($query);
			if ( $result) {
				echo "Card Added";
				}
			else {
				echo "Sorry, your card cannot be added at this time.";
			}
			$result->free();
			*/
			$db->close();
		?>
	</body>
</html>