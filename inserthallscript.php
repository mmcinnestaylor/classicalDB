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
	
		$hallname = htmlspecialchars($_POST['hallname']);
		$year = htmlspecialchars($_POST['year']);
		$city = htmlspecialchars($_POST['city']);
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");
			
		$result = $mysqli->query("INSERT INTO ConcertHall(hallname, yearestablished, cityname) 										VALUES('$hallname','$year','$city')");

		if($result){echo "Database updated. Redirecting...";}
		mysqli_close($mysqli);
	?>
<meta http-equiv="refresh" content="5; URL='inserthallform.php'"/>
	
</body>
</html>