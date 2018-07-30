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
		$year = htmlspecialchars($_POST['yearcompleted']); 
		$style = htmlspecialchars($_POST['stylename']); 
		$era = htmlspecialchars($_POST['eraname']);
		$newval = htmlspecialchars($_POST['newval']);
		
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");

	
			$mysqli->query("Update Song SET $column = '$newval' WHERE Song.songname='$songname' AND Song.composerlastname= '$lastname'");
			if($result){
			echo "Database updated. Redirecting...";}
		
		mysqli_close($mysqli);
	?>
	
	<meta http-equiv="refresh" content="5; URL='updatesongform.php'"/>
	

</body>
</html>