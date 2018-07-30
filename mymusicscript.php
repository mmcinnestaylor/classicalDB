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
<body>
	<?php 
		session_start();
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
	
		$selection = htmlspecialchars($_POST['lastname']);
			
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");
		$result = $mysqli->query("SELECT eraname FROM Song, Conductor WHERE Song.composerlastname = '$selection'");
		$row = $result->fetch_assoc();
		$era = $row['eraname'];
	
		
	
		
			$result = $mysqli->query("SELECT * from Song WHERE Song.eraname = '$era'");
			$count = $result->num_rows;
			if($count == 0){echo "We couldn's find any music you may enjoy.";}
			else{
					echo "Songs you man enjoy based on your selection:";
				    while ($row = $result->fetch_assoc()){
        				echo '<pre>';
    					print_r ($row);
    					echo '</pre>';
    				}
				mysqli_free_result($result);
                    
			}
			
			$result = $mysqli->query("SELECT DISTINCT * FROM Person WHERE Person.lastname IN(SELECT DISTINCT composerlastname FROM Song WHERE Song.eraname = '$era')");
			$count = $result->num_rows;
			if($count == 0){echo "We couldn's find any composers you may enjoy.";}
			else{
					echo "Composers you man enjoy based on your selection:";
				    while ($row = $result->fetch_assoc()){
        				echo '<pre>';
    					print_r ($row);
    					echo '</pre>';
    				}
				mysqli_free_result($result);
                    
			}
			

		mysqli_close($mysqli);
	?>
	
	<a href="mymusic.php">Return to My Music page</a>
	
<body>
</body>
</html>