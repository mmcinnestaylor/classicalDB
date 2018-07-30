<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="index.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/alex-brush:n4:default.js" type="text/javascript"></script>
</head>


<body>
<header>
		<nav>
			<ul>
				<li><a href="index.html">HOME</a></li>
				<li><a href="register.html">REGISTER</a></li>
			</ul>
		</nav>
		
	</header>
	
<h1>Classical DB Account Registration</h1>

<?php 
	$firstname = htmlspecialchars($_POST['firstname']); 
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$passconfirm = htmlspecialchars($_POST['passconfirm']);
	
	$mysqli = new mysqli("localhost","marlan","cop4710", "cop4710");
	$result = $mysqli->query("SELECT username FROM User WHERE username = '$username'");

	if($password != $passconfirm){
		echo "Error: passwords to not match. Redirecting...";
	}
	else if($result->num_rows == 0){
		$mysqli->query("CREATE USER '$username'@'localhost' IDENTIFIED BY '$password'");
		$mysqli->query("GRANT ALL ON *.* TO '$username'@'localhost'");
		$mysqli->query("INSERT INTO User(username, password, firstname) VALUES('$username','$password','$firstname')");
		echo "Account creation successful. Redirecting..."; 
		
	}
	else{
		echo "Registration failed. Please try a different username/password combination. Redirecting...";
	}
	
	mysqli_close($mysqli);
	
?>
	<meta http-equiv="refresh" content="5; URL='index.html'"/>
</body>
</html>