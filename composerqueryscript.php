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
	
		$selection = htmlspecialchars($_POST['RadioGroup1']);
			
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");

	
		if($selection == "alpha"){
			echo "All composers listed alphebetically";
			$result = $mysqli->query("SELECT Person.lastname, Person.firstname, Person.middlename, Person.birthdate, Person.nationality, Person.url FROM Composer, Person WHERE Composer.lastname = Person.lastname AND Composer.firstname = Person.firstname AND Composer.middlename = Person.middlename AND Composer.birthdate = Person.birthdate");
			
			$count = $result->num_rows;
			if($count == 0){echo "The search returned '$count' results.";}
			else{
				    while ($row = $result->fetch_assoc()){
        				echo '<pre>';
    					print_r ($row);
    					echo '</pre>';
    				}
				mysqli_free_result($result);
                    
			}
			
		}
		else if($selection == "nationality"){
			echo "All composers listed by nationality";
			$result = $mysqli->query("SELECT Person.lastname, Person.firstname, Person.middlename, Person.birthdate, Person.nationality, Person.url FROM Composer, Person WHERE Composer.lastname = Person.lastname AND Composer.firstname = Person.firstname AND Composer.birthdate = Person.birthdate ORDER BY nationality");
			$count = $result->num_rows;
			if($count == 0){echo "The search returned '$count' results.";}
			else{
				    while ($row = $result->fetch_assoc()){
        				echo '<pre>';
    					print_r ($row);
    					echo '</pre>';
    				}
				mysqli_free_result($result);
                    
			}
			
		}
		else{
			echo "All composers who have composed a piano concerto";
			$result = $mysqli->query("SELECT Person.lastname, Person.firstname, Person.middlename, Person.birthdate, Person.nationality, Person.url FROM Composer, Person WHERE Composer.lastname = Person.lastname AND Composer.firstname = Person.firstname AND Composer.middlename = Person.middlename AND Composer.birthdate = Person.birthdate AND Composer.lastname IN (SELECT Composer.lastname FROM Composer, Song WHERE Composer.lastname = Song.composerlastname)");
			$count = $result->num_rows;
			if($count == 0){echo "The search returned '$count' results.";}
			else{
				    while ($row = $result->fetch_assoc()){
        				echo '<pre>';
    					print_r ($row);
    					echo '</pre>';
    				}
				mysqli_free_result($result);
                    
			}
			
		}

		mysqli_close($mysqli);
	?>
	
	<a href="composerquery.php">Return to Query page</a>
	
<body>
</body>
</html>