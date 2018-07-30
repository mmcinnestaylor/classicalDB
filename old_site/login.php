<!doctype html>
<html>
<?php 
	session_start();
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	
	$mysqli = new mysqli("localhost","$username","$password", "cop4710");

	if(!($mysqli->connect_error)){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		mysqli_close($mysqli);
		header('Location: main.php');
	}
	
?>
<head>
<meta charset="UTF-8">
<title>The Classical DB</title>
<link href="index.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/alex-brush:n4:default.js" type="text/javascript"></script>

</head>
	
<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.html">HOME</a></li>
				<li><a href="register.html">REGISTER</a></li>
			</ul>
		</nav>
		<p>Classical DB</p>
	</header>
	<?php echo "Log in failed."?>
	<meta http-equiv="refresh" content="5; URL='index.html'"/>

</body>
</html>
