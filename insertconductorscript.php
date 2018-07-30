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
		$nationality = htmlspecialchars($_POST['demonym']); 
		$url = htmlspecialchars($_POST['url']);	
		
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");
		$result = $mysqli->query("SELECT lastname FROM Person WHERE Person.lastname= '$lastname' AND Person.firstname= '$firstname'
								AND Person.birthdate= '$birthdate'");
	
		if($result->num_rows == 0){
			$result = $mysqli->query("INSERT INTO Person(lastname, firstname, middlename, birthdate, nationality, url) 										VALUES('$lastname','$firstname','$middlename','$birthdate','$nationality','$url')");
			$result = $mysqli->query("INSERT INTO Conductor(lastname, firstname, middlename, birthdate) 												VALUES('$lastname','$firstname','$middlename','$birthdate')");
			if($result){echo "Database updated. Redirecting...";}
		}
		else{	
			$result = $mysqli->query("INSERT INTO Conductor(lastname, firstname, middlename, birthdate) VALUES('$lastname','$firstname','$middlename','$birthdate')");
			if($result){echo "Database updated. Redirecting...";
			}
		}
		mysqli_close($mysqli);
	?>
	
	<meta http-equiv="refresh" content="5; URL='insertconductorform.php'"/>
	
</body>
</html>