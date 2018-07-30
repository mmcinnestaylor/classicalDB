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

		
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");
		$result = $mysqli->query("INSERT INTO Orchestra(orchestraname, cityname, yearestablished, conductor) VALUES('$orchestraname','$city','$year','$lastname')");
		
		if($result){echo "Database updated. Redirecting...";}
		
		mysqli_close($mysqli);
	?>
	
	<meta http-equiv="refresh" content="5; URL='insertorchestraform.php'"/>
	
</body>
</html>