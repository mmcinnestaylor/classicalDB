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
	
		$hallname = htmlspecialchars($_POST['hallname']);
		$year = htmlspecialchars($_POST['yearestablished']);
		$city = htmlspecialchars($_POST['cityname']); 
		$newval = htmlspecialchars($_POST['newval']); 	
		$column = htmlspecialchars($_POST['column']);
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");
		$result = $mysqli->query("SELECT hallname FROM ConcertHall WHERE hallname= '$hallname' AND yearestablished= '$year'
								AND cityname= '$city'");
	
		if($result->num_rows == 0){
			echo "The concert hall you entered is not in the database. Update failed. Redirecting..."; 
		}
		else{
			$result = $mysqli->query("UPDATE ConcertHall SET $column = '$newval' WHERE ConcertHall.hallname = '$hallname' AND ConcertHall.yearestablished = '$year' AND ConcertHall.cityname = '$city'");
			if($result){echo "Database updated. Redirecting...";
			}
		}
		mysqli_close($mysqli);
	?>
	
	<meta http-equiv="refresh" content="5; URL='updatehallform.php'"/>
	
<body>
</body>
</html>