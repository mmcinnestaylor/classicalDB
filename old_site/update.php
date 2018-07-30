<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>The Classical DB</title>
<link href="insert.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/alex-brush:n4:default.js" type="text/javascript"></script>

</head>
	
<?php 
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
?>

<body>
<header>
		<nav>
			<ul>
				<li><a href="logout.php">LOGOUT</a></li>
			</ul>
		</nav>
		<p>Classical DB</p>
</header>
	
	<p>Choose a record type to update:</p>
	<ul>
		<li><a href="updateconductorform.php">Conductor</a></li>
		<li><a href="updatecomposerform.php">Composer</a></li>
		<li><a href="updatesongform.php">Song</a></li>
		<li><a href="updatehallform.php">Concert Hall</a></li>
		<li><a href="updateorchestraform.php">Orchestra</a></li>
	</ul>

	<a href="main.php">Return to main page</a>
</body>
</html>