<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>The Classical DB</title>
<link href="main.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/alex-brush:n4:default.js" type="text/javascript"></script>

</head>
	


<body>
<header>
		<nav>
			<ul>
				<li><a href="logout.php">LOGOUT</a></li>
			</ul>
		</nav>
		<p>Classical DB</p>
</header>

<body>
	<?php 
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$mysqli = new mysqli("localhost","$username","$password", "cop4710");
	
	$search = htmlspecialchars($_POST['search']);
	$table = htmlspecialchars($_POST['RadioGroup1']);
	
	if($table == 'Composer'){
			
		$result = $mysqli->query("SELECT * FROM '$table' WHERE lastname= '$search'");
	
	if($result){
    	while ($row = $result->fetch_assoc()){
        	echo '<pre>';
    		print_r ($row);
    		echo '</pre>';
			$result->free();
    	}
	}
	}
	
	
	
	$result = $mysqli->query("SELECT distinct * FROM '$table' WHERE * LIKE '%'$search'%';");
	
	if($result->num_rows != 0){
    	while ($row = $result->fetch_assoc()){
        	echo '<pre>';
    		print_r ($row);
    		echo '</pre>';
			$result->free();
    	}
	}
	else{echo "The search did not return any results.";}
    
    
	mysqli_close($mysqli);
?>
</body>
	<a href="main.php">Return to main page</a>
</html>




	