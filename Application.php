<?php
<html>
<body>

<form action="createApplication.php" method="post">
Name: <input type="text" name="uname"><br>
Birthday: <input type="date" name="birthday"><br>
Gender: <select name="gender">
<option value="male">Male</option>
<option value="female">Female</option>:<br />
Income: <input type="text" name="income"><br>
Apartment Category: <select name="apt_cat">
<option value="male">Male</option>
<option value="female">Female</option>:<br />
Preferred Move In Date: <input type="date" name="movein"><br>
Previous Residence: <input type="text" name="prev"><br>
Rent Minimum: <input type="text" name="min"><br>
Rent Maximum: <input type="text" name="max"><br>

<input type="submit" value="Create">
</form>

</body>
</html>
?>