<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>
	<style>
		body {
		background-color: #B9B9EA;
    	font-family: "Lato", sans-serif;
		}
	</style>
<body>
	<?php 
		session_start();
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
	
		$lastname = htmlspecialchars($_POST['lastname']);
		$firstname = htmlspecialchars($_POST['firstname']);
		$middlename = htmlspecialchars($_POST['middlename']);
		$birthdate = htmlspecialchars($_POST['date']); 
		$selection = htmlspecialchars($_POST['RadioGroup1']);
		
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");
	
		if($selection == 'single'){
			$result = $mysqli->query("DELETE FROM Conductor WHERE Conductor.lastname='$lastname' AND Conductor.firstname= '$firstname' AND Conductor.birthdate= '$birthdate'");
			if($result){
			echo "Database updated. Redirecting...";}
		}
		else{	
			$result = $mysqli->query("DELETE FROM Conductor WHERE Conductor.lastname='$lastname' OR Conductor.firstname= '$firstname' OR Conductor.middlename= '$middlename' OR Conductor.birthdate= '$birthdate'");
			if($result){
			echo "Database updated. Redirecting...";}
		}
		mysqli_close($mysqli);
	?>
	
	<meta http-equiv="refresh" content="5; URL='deleteconductorform.php'"/>
	

</body>
</html>