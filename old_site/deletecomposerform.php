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
	
<?php 
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$mysqli = new mysqli("localhost","$username","$password", "cop4710");
	$result = $mysqli->query("SELECT demonym FROM Country");
	$demonyms = $result->fetch_assoc();
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

<body>
<form action = "deletecomposerscript.php" method = "post">
		<h1>Remove a Composer from the Database</h1>
		<p>Last name*: <input type="text" name= "lastname"/></p>
  		<p>First name*: <input type="text" name= "firstname"/></p>
		<p>Middle name: <input type="text" name= "middlename"/></p>
  		<p>Birthdate*: <input type="text" id="Datepicker1" name="date"></p>
  		<p>Nationality: <input type="text" name= "demonym"/>
		<p>Url: <input type="text" name= "url"/>
		<p>*Required Field for Single Record deletion</p>
  <p>
 		  <label>
 		    <input type="radio" name="RadioGroup1" value="single" id="RadioGroup1_0">
 		    Single Record</label>
 		  <label>
 		    <input type="radio" name="RadioGroup1" value="multi" id="RadioGroup1_1">
 		    Any related record</label>
  </p>
<p><input type="submit"/></p>
</form>
<script type="text/javascript">
$(function() {
	$( "#Datepicker1" ).datepicker({dateFormat: "yy-mm-dd"}); 
});
    </script>
</body>
	<a href="main.php">Return to main page</a>
</html>




	