<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>The Classical DB</title>
<link href="main.css" rel="stylesheet" type="text/css">
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

<?php echo "Hello $username!";?>
	
<article>
	<form action = "search.php" method = "post">
		<p>Search:<input type="text" name="search">
			Within:
		  <label>
		    <input type="radio" name="RadioGroup1" value="Composer" id="RadioGroup1_0">
		    Composers</label>
		  
		  <label>
		    <input type="radio" name="RadioGroup1" value="Conductor" id="RadioGroup1_1">
		    Conductors</label>
		  
		  <label>
		    <input type="radio" name="RadioGroup1" value="Song" id="RadioGroup1_2">
		    Songs</label>
		  
		  <label>
		    <input type="radio" name="RadioGroup1" value="Performance" id="RadioGroup1_3">
		    Performances</label>
		  
		  <label>
		    <input type="radio" name="RadioGroup1" value="ConcertHall" id="RadioGroup1_4">
		    Concert Halls</label>
		<label>
		    <input type="radio" name="RadioGroup1" value="Orchestra" id="RadioGroup1_4">
		    Orchestras</label> 
		<input type="submit" action="search.php">
		</p>
		
	</form>
</article>
	
<p>
	<ul>
		<li><a href="insert.php">Insert a Record</a></li>
		<li><a href="update.php">Update a Record</a></li>	
		<li><a href="delete.php">Delete a Record</a></li>
	</ul>
</p>

<p>Selected Queries</p>
<table width="300" border="1">
  <tbody>
    <tr>
      <td>&nbsp;<a href="query1.php">List all German Composers</a></td>
      <td>&nbsp;<a href="query2.php">List all Individuals who have composed a Concerto</a></td>
      <td>&nbsp;<a href="query3.php">List all American Conductors</a></td>
    </tr>
    <tr>
      <td>&nbsp;<a href="query4.php">List all Music by French Composers</a></td>
      <td>&nbsp;<a href="query5.php">Get a recommendation!</a></td>
      <td>&nbsp;<a href="query6.php">Orchestra Related Queries</a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>
