<?php
include 'dbinfo.php' ;
?>

<html>
<body>
<h1>Create New Account</h1>

<form action="" method="post">
<label>Username: </label>
<input id="Uname" type="text" name="loginName">

<label>Password: </label>
<input id="Upass" type="password" name="loginPassword">

<label>Confirm Passord: </label>
<input id="Upass2" type="password" name="loginPassword2">

<input name="Submit" type="submit" value=" Create Account ">

</form>
</body>
</html>

<?php


//always start the session before anything else!!!!!! 
session_start();

if(isset($_POST['Submit'])){
        if(empty($_POST['loginName']) || empty($_POST['loginPassword']) || empty($_POST['loginPassword2']))  {
                $err = "Username and Password fields cannot be empty";
        }elseif($_POST['loginPassword'] != $_POST['loginPassword2']){
		$err = "Passwords do not match. Please type again.";
	}else{
                $loginName = $_POST['loginName']; //populate variable with given 
                $loginPassword = $_POST['loginPassword'];
// store session data
                $_SESSION['loginName']=$loginNname;
                $_SESSION['loginPassword']=$loginPassword;


//connect to the db 
                mysql_connect($host,$username,$password) or die( "Unable to connect");
                mysql_select_db($database) or die( "Unable to select database");


         //Our SQL Query
                $sql_query = "SELECT Username FROM DB_USER WHERE Username = '$loginName'";


                //Run our sql query
                $result = mysql_query ($sql_query)  or die(mysql_error());


                $rows = mysql_num_rows($result);


                //this is where the actual verification happens 
                if($rows == 1){
               //the User exists
		$err = "Username already taken. Please choose another.";
		}else{
		//send to application form
			header('Location: Application.php';
		}
	}
}

echo $err;
?>
	
