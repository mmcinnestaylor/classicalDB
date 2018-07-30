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
		$selection = htmlspecialchars($_POST['RadioGroup1']);
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");

		if($selection == 'single'){
			$result = $mysqli->query("Delete from ConcertHall WHERE ConcertHall.hallname= '$hallname' AND ConcertHall.yearestablished= '$year' AND ConcertHall.cityname = '$city'");
			if($result){
			echo "Database updated. Redirecting...";}
		}
		else{			
			$result = $mysqli->query("Delete from ConcertHall WHERE ConcertHall.hallname= '$hallname' OR ConcertHall.yearestablished= '$year' OR ConcertHall.cityname = '$city'");
			if($result){
			echo "Database updated. Redirecting...";}
		}
		mysqli_close($mysqli);
	?>
<meta http-equiv="refresh" content="5; URL='deletehallform.php'"/>
	

</body>
</html>