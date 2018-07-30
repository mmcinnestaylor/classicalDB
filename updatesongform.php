<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>The Classical DB</title>

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/alex-brush:n4:default;rouge-script:n4:default.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
	background-color: #B9B9EA;
    font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
	height: 100%;
	width: 200px;
	position: fixed;
	z-index: 1;
	top: 0;
	left: 0;
	background-color: #111;
	overflow-x: hidden;
	padding-top: 20px;
	font-size: large;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
    color: #f1f1f1;
}

/* Main content */
.main {
    margin-left: 200px; /* Same as the width of the sidenav */
    font-size: 20px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
    background-color: green;
    color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
    display: none;
    background-color: #262626;
    padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
    float: right;
    padding-right: 8px;
}
.main h1 {
	font-family: rouge-script;
	font-style: normal;
	font-weight: 400;
	text-align: center;
}
.main h2 {
	font-style: normal;
	font-weight: 400;
	text-align: center;
}
	
/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
</head>
<?php 
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$mysqli = new mysqli("localhost","$username","$password", "cop4710");
	
	$result = $mysqli->query("SELECT DISTINCT lastname FROM Composer");
	$opt = "<select name='lastname'>";
		while($row = $result->fetch_assoc()){
					$opt .= "<option value='{$row['lastname']}'>{$row['lastname']}</option>";
				}
	$opt .= "</select>";
		
	$result = $mysqli->query("SELECT DISTINCT year FROM ValidYear");
	$opt2 = "<select name='year'>";
	$opt2 .= "<option value=''></option>";
		while($row = $result->fetch_assoc()){
					$opt2 .= "<option value='{$row['year']}'>{$row['year']}</option>";
				}
	$opt2 .= "</select>";
	
	$result = $mysqli->query("SELECT DISTINCT stylename FROM Style");
	$opt3 = "<select name='style'>";
	$opt3 .= "<option value=''></option>";
		while($row = $result->fetch_assoc()){
					$opt3 .= "<option value='{$row['stylename']}'>{$row['stylename']}</option>";
				}
	$opt3 .= "</select>";
	
	$result = $mysqli->query("SELECT DISTINCT eraname FROM Era");
	$opt4 = "<select name='era'>";
	$opt4 .= "<option value=''></option>";
		while($row = $result->fetch_assoc()){
					$opt4 .= "<option value='{$row['eraname']}'>{$row['eraname']}</option>";
				}
	$opt4 .= "</select>";
	
?>
<body>
	<div class="sidenav">
	<a href="main.php">Home</a>
  <a href="#about">My Music</a>
	<button class="dropdown-btn">Add 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="insertconductorform.php">Conductor</a>
    <a href="insertcomposerform.php">Composer</a>
    <a href="insertsongform.php">Song</a>
	<a href="inserthallform.php">Concert Hall</a>
	<a href="insertorchestraform.php">Orchestra</a>
  </div>
	<button class="dropdown-btn">Update 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="updatepersonform.php">Conductor/Composer</a>
    <a href="updatesongform.php">Song</a>
	<a href="updatehallform.php">Concert Hall</a>
	<a href="updateorchestraform.php">Orchestra</a>
  </div>
		<button class="dropdown-btn">Remove 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="deleteconductorform.php">Conductor</a>
    <a href="deletecomposerform.php">Composer</a>
    <a href="deletesongform.php">Song</a>
	<a href="deletehallform.php">Concert Hall</a>
	<a href="deleteorchestraform.php">Orchestra</a>
  </div>
  <button class="dropdown-btn">Queries 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Conductor</a>
    <a href="#">Composer</a>
    <a href="#">Song</a>
  </div>
  <a href="#contact">Search</a>
	<a href="logout.php">Logout</a>
</div>

<div class="main">
  <h1>Classical DB</h1>
<form action = "updatesongscript.php" method = "post">
		<h2>Update a Song's Information</h2>
		<p>Song name*: <input type="text" name= "songname"/></p>
		<p>Composer last name*: <?php echo "$opt";?></p>
		<p>*Required field</p>
		<p>Update: 
		<select name= column>
		<option value="songname">Song name</option>
		<option value="composerlastname">Composer</option>
		<option value="yearcompleted">Year Completed</option>
		<option value="stylename">Style</option>
		<option value="eraname">Era</option>
    	</select> with value: <input type="text" name= "newval"></p>
		
  <p><input type="submit"/></p>
</form>
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

	
</body>
</html>
