<?php require('connect_db.php') ?>
<html>
	<head>
		<title>Payment Information</title>
	</head>
	<body>
		<table cellspacing="10">
			<tr>
				<td>Add Card</td>
				<td>Delete Card Information</td>
			</tr>
			<tr>
				<td><form action="add_card.php" method="post">
					Name on card:
					<input name="cardholder" type="text" size="40" />
					<br />
					Card Number:
					<input name="cardnumber" type="text" size="40" />
					<br />
					Expiration Date:
					<input name="expdate" type="text" size="10" />
					<br />
					CVV:
					<input name="cvv" type="text" size="6" />
					<br />
					<input name = "addcard" type="submit" value="Add Card" />
					</form>
				</td>
				<td><form action="delete_card.php" method="post">
					<select name="card" >
					Select card:
					<?php
						start_session();
						$username = $_SESSION['loginName'];
						// Grab the relevant credit card numbers
						// Then put them in a drop-down box
						$db = connect_db();
						$query = "select Card_No from PAYMENT_INFORMATION where Username = '".$username."';";
						$result = $db->query($query);
						$num_rows = $result->num_rows;
						for ($i=0;$i<$num_rows;$i++) {
							$row = $result->fetch_assoc();
							echo "<option value='".$row['Card_No']."'>".$row['Card_No']."</option>\n";
						}
						$result->free();
						$db->close();
					?>
					<input name="delcard" type="submit" value="Delete Card" />
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>
