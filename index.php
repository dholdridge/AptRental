<?php
include 'dbinfo.php' ; 
include 'createUser.php';
?>

<html>

<body>
<h1>Apartment Login System</h1>

<form action="" method="post">
<label>Username: </label>
<input id="Uname" type="text" name="loginName">

<label>Password: </label>
<input id="Upass" type="password" name="loginPassword">

<input name="Submit" type="submit" value=" Login ">
<input name="CreateUser" type ="submit" value = " Create New User">

</form>


</body>
</html>



<?php


//always start the session before anything else!!!!!! 
session_start(); 

if(isset($_POST['Submit'])){
	if(empty($_POST['loginName']) || empty($_POST['loginPassword']))  {
		$err = "Username or Password is invalid";
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
		$sql_query = "SELECT Username FROM DB_USER WHERE Username = '$loginName' AND User_Password = '$loginPassword'";  

 
         	//Run our sql query
		$result = mysql_query ($sql_query)  or die(mysql_error());  


		$rows = mysql_num_rows($result);
		
	
		//this is where the actual verification happens 
		if($rows == 1){ 
	       //the User exists
	       //check what kind of user
			$sql_query_manager = "SELECT Username FROM MANAGEMENT WHERE Username = '$loginName'";  
			$result_manager = mysql_query ($sql_query_manager)  or die(mysql_error());  
			if(mysql_num_rows($result_manager) == 1){ 
    				#User is a Manager and should be directed to manager homepage	
			
				header('Location: managerHome.php');
		    	}else{
				$sql_query_resident = "SELECT Username FROM RESIDENT WHERE Username = '$loginName'";  
				$result_resident = mysql_query ($sql_query_resident)  or die(mysql_error());  
				if(mysql_num_rows($result_resident) == 1){ 
    				#User is a Current Resident and should be directed to Resident homepage
					header('Location: residentHome.php');
				}else{
    				#User is a prosp res and should receive an error message
					$err = 'Your application is under review';
				}
			}
    	        
		}else{ 
			
			$err = 'Username/Password combination is not correct. Please try again or create an account.' ; 
		} 

	}
} 

echo $err;
?>


