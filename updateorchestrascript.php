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
	
		$orchestraname = htmlspecialchars($_POST['orchestraname']);
		$year = htmlspecialchars($_POST['year']);
		$city = htmlspecialchars($_POST['city']);
		$lastname = htmlspecialchars($_POST['lastname']); 
		$column = htmlspecialchars($_POST['column']);
		$newval = $htmlspecialchars($_POST['newval']);
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");
		$result = $mysqli->query("UPDATE Orchestra SET $column= '$newval' WHERE Orchestra.orchestraname = '$orchestraname' AND Orchestra.yearestablished ='$yearestablished' AND Orchestra.cityname = '$city'");
		
		if($result){echo "Database updated. Redirecting...";}
		
		mysqli_close($mysqli);
	?>
	
	<meta http-equiv="refresh" content="5; URL='updateorchestraform.php'"/>
	
</body>
</html>