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
			echo "All songss listed alphebetically";
			$result = $mysqli->query("SELECT * from Song");
			
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
		else if($selection == "style"){
			echo "All songs ordered by style";
			$result = $mysqli->query("SELECT * FROM Song ORDER BY stylename");
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
		else if($selection == "era"){
			echo "All songs ordered by era";
			$result = $mysqli->query("SELECT * FROM Song ORDER BY eraname");
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
		else if($selection == "composer"){
			echo "All songs ordered by composer";
			$result = $mysqli->query("SELECT * FROM Song ORDER BY composerlastname");
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
			echo "Romantic Era Music ordered by composer nationality";
			$result = $mysqli->query("SELECT Song.songname, Song.composerlastname, Person.nationality, Song.yearcompleted, Song.stylename, Song.eraname FROM Song, Person WHERE Song.composerlastname = Person.lastname AND Song.eraname = 'Romantic' ORDER BY Person.nationality");
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
	
	<a href="songquery.php">Return to Query page</a>
	
<body>
</body>
</html>