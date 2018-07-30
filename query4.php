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
			
	$result = $mysqli->query("SELECT songname, conductorlastname 
							FROM Song 
							WHERE Song.composerlastname 
							(SELECT distinct Person.lastname from Person, Composer
														WHERE Person.lastname = Composer.lastname 
														AND Person.firstname = Composer.firstname
														AND Person.birthdate = Composer.birthdate
														AND Person.demonym = 'French')");
	
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