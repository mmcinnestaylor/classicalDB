<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>
	<?php 
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	
	$mysqli = new mysqli("localhost","$username","$password", "cop4710");
			
	$result = $mysqli->query("SELECT *  FROM Composer, Person 
							WHERE Composer.lastname = Person.lastname 
  							AND Composer.firstname = Person.firstname 
  							AND Person.nationality = 'German'");
	
	if($result){
    	while ($row = $result->fetch_assoc()){
        	echo '<pre>';
    		print_r ($row);
    		echo '</pre>';
    	}
	}
	$result->free();
	mysqli_close($mysqli);
	?>
<body>
		<a href="main.php">Return to main page</a>
</body>

</html>