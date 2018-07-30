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
		$selection = htmlspecialchars($_POST['RadioGroup1']);
		
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");

	
		if($selection == 'single'){
			$mysqli->query("DELETE FROM Song WHERE Song.songname='$songname' AND Song.composerlastname= '$lastname'");
			if($result){
			echo "Database updated. Redirecting...";}
		}
		else{	
			$mysqli->query("DELETE FROM Song WHERE Song.songname='$songname' OR Song.composerlastname= '$lastname' OR Song.yearcompleted = '$year' OR Song.stylename= '$style' OR Song.eraname= '$era'");
			if($result){
			echo "Database updated. Redirecting...";}
		}
		mysqli_close($mysqli);
	?>
	
	<meta http-equiv="refresh" content="5; URL='deletesongform.php'"/>
	

</body>
</html>