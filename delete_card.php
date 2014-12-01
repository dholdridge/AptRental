<?php require('connect_db.php'); ?>
<html>
	<head>
		<title>Delete Card</title>
	</head>
	<body>
		<?php
			$num = $_POST['card'];
			
			$db = connect_db();
			$query = "delete from PAYMENT_INFORMATION where Card_No like '$num';";
			echo $query."\n";
			
			$result = $db->query($query);
			if ($result) {
				echo "Card successfully removed.";
			}
			else {
				echo "Sorry, we couldn't remove your card at this time. Try again later.";
			}
			$result->free();
			$db->close();
		?>
	</body>
</html>