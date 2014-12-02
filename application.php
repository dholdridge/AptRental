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




