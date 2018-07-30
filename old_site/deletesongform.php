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
<form action = "deletesongscript.php" method = "post">
		<h1>Remove a Song from the Database</h1>
		<p>Song name*: <input type="text" name= "songname"/></p>
  		<p>Composer last name*: <input type="text" name= "lastname"/></p>
		<p>Composer first name*: <input type="text" name= "firstname"/></p>
  		<p>Year completed: <input type="text" name="year"></p>
  		<p>Style name: <input type="text" name= "style"/>
		<p>Era name: <input type="text" name= "era"/>
		<p>*Required for single record deletion</p>
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
</body>
	<a href="main.php">Return to main page</a>
</html>




	