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
	
		$table = htmlspecialchars($_POST['table']);
		$search = htmlspecialchars($_POST['search']);
	
	
		$mysqli = new mysqli("localhost","$username","$password", "cop4710");

	
		if($table == "Conductor"){
			echo "Searching within Conductors";
			$result = $mysqli->query("SELECT distinct * FROM Conductor WHERE lastname LIKE '%$search%' OR firstname LIKE '%$search%' OR middlename LIKE '%$search%' or birthdate LIKE '%$search%'");
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
		else if($table == "Composer"){
			echo "Searching within Composers";
			$result = $mysqli->query("SELECT distinct * FROM Composer WHERE lastname LIKE '%$search%' OR firstname LIKE '%$search%' OR middlename LIKE '%$search%' or birthdate LIKE '%$search%'");
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
		else if($table == "ConcertHall"){
			echo "Searching within Concert Halls";
			$result = $mysqli->query("SELECT distinct * FROM ConcertHall WHERE hallname LIKE '%$search%' OR yearestablished LIKE '%$search%' OR cityname LIKE '%$search%'");
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
		else if($table == "Orchestra"){
			echo "Searching within Orchestras";
			$result = $mysqli->query("SELECT distinct * FROM Orchestra WHERE orchestraname LIKE '%$search%' OR cityname LIKE '%$search%' OR yearestablished LIKE '%$search%' OR conductor LIKE '%$search%'");
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
		else {
			echo "Searching within Songs";
			$result = $mysqli->query("SELECT distinct * FROM Song WHERE songname LIKE '%$search%' OR composerlastname LIKE '%$search%' OR yearcompleted LIKE '%$search%' or stylename LIKE '%$search%' OR eraname LIKE '%$search'");
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
	
	<a href="search.php">Return to Search page</a>
	
<body>
</body>
</html>