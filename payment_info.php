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
				<td><form action="delete_card.php" method-"post">
					Select card:
					<?php
						// Grab the relevant credit card numbers
						// Then put them in a drop-down box
					?>
					<input name="delcard" type="submit" value="Delete Card" />
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>