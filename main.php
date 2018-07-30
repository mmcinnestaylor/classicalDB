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

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 75%;
}
</style>
</head>
<?php 
	session_start();

	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
?>
<body>
	<div class="sidenav">
	<a href="main.php">Home</a>
  <a href="mymusic.php">My Music</a>
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
    <a href="conductorquery.php">Conductor</a>
    <a href="composerquery.php">Composer</a>
    <a href="songquery.php">Song</a>
  </div>
  <a href="search.php">Search</a>
	<a href="logout.php">Logout</a>
</div>

<div class="main">
  <h1>Classical DB</h1>
<img src="images/composers.jpg" alt="Composers" class="center"/> </div>

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
