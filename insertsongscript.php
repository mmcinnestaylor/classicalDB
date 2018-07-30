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
	
		$songname = htmlspecialchars($_POST['songname']);
		$lastname = htmlspecialchars($_POST['lastname']);
		$year = htmlspecialchars($_POST['year']); 
		$style = htmlspecialchars($_POST['style']); 
		$era = htmlspecialchars($_POST['era']);	
		
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");
			
			$result = $mysqli->query("INSERT INTO Song(songname,composerlastname, yearcompleted, stylename, eraname) VALUES('$songname','$lastname','$year','$style','$era')");
			if($result){echo "Database updated. Redirecting...";}
		

		mysqli_close($mysqli);
	?>
	
	<meta http-equiv="refresh" content="5; URL='insertsongform.php'"/>
	
</body>
</html>