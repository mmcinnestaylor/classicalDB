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
		$selection = htmlspecialchars($_POST['RadioGroup1']);

		
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");

	
		if($selection == 'single'){
			$mysqli->query("DELETE FROM Orchestra WHERE Orchestra.orchestraname= '$orchestraname' AND Orchestra.cityname= '$city' AND Orchestra.yearestablished= '$year'");
			if($result){
			echo "Database updated. Redirecting...";}
		}
		else{	
			$mysqli->query("DELETE FROM Orchestra WHERE Orchestra.orchestraname= '$orchestraname' OR Orchestra.cityname= '$city' OR Orchestra.yearestablished= '$year' OR Orchestra.conductor= '$lastname'");
			if($result){
			echo "Database updated. Redirecting...";}
			}
		
		mysqli_close($mysqli);
	?>
	
	<meta http-equiv="refresh" content="5; URL='deleteorchestraform.php'"/>
	

</body>
</html>