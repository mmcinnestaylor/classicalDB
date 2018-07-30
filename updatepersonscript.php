<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>
	body {
	background-color: #B9B9EA;
    font-family: "Lato", sans-serif;
}</style>
</head>
	<?php 
		session_start();
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
	
		$lastname = htmlspecialchars($_POST['lastname']);
		$firstname = htmlspecialchars($_POST['firstname']);
		$birthdate = htmlspecialchars($_POST['date']); 
		$newval = htmlspecialchars($_POST['newval']); 	
		$table = htmlspecialchars($_POST['RadioGroup1']);
		$column = htmlspecialchars($_POST['column']);
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");
		$result = $mysqli->query("SELECT lastname FROM Person WHERE Person.lastname= '$lastname' AND Person.firstname= '$firstname'
								AND Person.birthdate= '$birthdate'");
	
		if($result->num_rows == 0){
			echo "The indivdual you entered is not in the database. Update failed. Redirecting..."; 
		}
		else if($column == "nationality" or $column == "url"){
			$result = $mysqli->query("UPDATE Person SET $column = '$newval' WHERE Person.lastname = '$lastname' AND Person.firstname = '$firstname' AND Person.birthdate = '$birthdate'");
			if($result){echo "Update successful. Redirecting...";}
		}
		else{
			echo "trying to update";
			$result = $mysqli->query("UPDATE Person SET $column = '$newval' WHERE lastname ='$lastname' AND firstname = '$firstname' AND birthdate = '$birthdate'");
			printf("Errormessage: %s\n", $mysqli->error);
			if($result){echo "Database updated. Redirecting...";
			}
		}
		mysqli_close($mysqli);
	?>
	
	<meta http-equiv="refresh" content="5; URL='updatepersonform.php'"/>
	
<body>
</body>
</html>