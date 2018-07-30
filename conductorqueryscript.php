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
			echo "All conductors listed alphebetically";
			$result = $mysqli->query("SELECT Person.lastname, Person.firstname, Person.middlename, Person.birthdate, Person.nationality, Person.url FROM Conductor, Person WHERE Conductor.lastname = Person.lastname AND Conductor.firstname = Person.firstname AND Conductor.middlename = Person.middlename AND Conductor.birthdate = Person.birthdate");
			
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
			echo "All conductors listed by nationality";
			$result = $mysqli->query("SELECT Person.lastname, Person.firstname, Person.middlename, Person.birthdate, Person.nationality, Person.url FROM Conductor, Person WHERE Conductor.lastname = Person.lastname AND Conductor.firstname = Person.firstname AND Conductor.birthdate = Person.birthdate ORDER BY nationality");
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
			echo "All conductors who have conducted a British orchestra";
			$result = $mysqli->query("SELECT Person.lastname, Person.firstname, Person.middlename, Person.birthdate, Person.nationality, Person.url FROM Conductor, Person WHERE Conductor.lastname = Person.lastname AND Conductor.firstname = Person.firstname AND Conductor.middlename = Person.middlename AND Conductor.birthdate = Person.birthdate AND Conductor.lastname IN (SELECT Conductor.lastname FROM Conductor, Orchestra WHERE Conductor.lastname = Orchestra.conductor AND Orchestra.orchestraname IN (SELECT Orchestra.orchestrname FROM Orchestra, City WHERE Orchestra.cityname = City.cityname AND City.cityname IN(SELECT City.cityname FROM City, Country WHERE City.countryname = Country.countryname)))");
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
	
	<a href="conductorquery.php">Return to Query page</a>
	
<body>
</body>
</html>