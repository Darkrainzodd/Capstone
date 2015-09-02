<?php
// Include the shared code
include '../lib/common.php';
include '../lib/db.php';
include '../lib/functions.php';
include '../lib/User.php';

// Start or continue the session.
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap/docs/favicon.ico">

    <title>Game Over X Guides</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body,td,th {
	color: #000;
}
.navbar-wrapper .container .navbar.navbar-inverse.navbar-static-top .container #navbar div {
	color: #999;
}
-->
  </style></head>
<!-- NAVBAR
================================================== -->
  <body>
<center>
<div class="content_wrapper"> <!-- customizing the site to show a background image while maintaining the content centered -->
<center>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Game X Over</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="guides.php">Guides</a></li>
				<li><a href="forum.php">Forums</a></li>
                <li><a href="signup.php">Sign Up</a></li>
              </ul>
				<div align="right">
					
					<?php 
					if($_SESSION['loggedin']==true) { 
							echo 'Welcome: ';
							echo '<a href="userprofile.php">';
							echo $_SESSION["username"];
							echo '</a>, ';
							echo '<a href="logout.php"><span> Logout</span></a></li>';
						} elseif($_SESSION['loggedin']==false) {
							
							echo 'Please <a href="signin.php">Log in</a>';
						}
					?>
				</div>
            </div>
          </div>
        </nav>

      </div>
    </div>


  <div>
  <h2>GUIDES</h2>
  <br />
<div class="container marketing">
  
  <div class="col-md-8">
  <div class="col-sm-6">
	<iframe width="300" src="https://www.youtube.com/embed/A6fl8pjlklU" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="col-sm-6">
	<h3>Sohm Al</h3>
	<p>
	Sohm Al is the second dungeon of the Heavensward expansion. You'll unlock this dungeon at around level 53 to 54. There are some familiar mechanics in this dungeon, as well as some new. Of the first four dungeons, I'd say this is the easiest.
	<p><i><a href="http://www.gameskinny.com/zvod4/ffxiv-heavensward-sohm-al-dungeon-guide">by GabrielKross</a></i></td></tr>
</div>
</div>
<div class="col-md-8">
  <div class="col-sm-6">
	<iframe width="300" src="https://www.youtube.com/embed/iDU5meNbURg" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="col-sm-6">
	<h3>The Vault</h3>
	<p>
	Just a bit of a warning, the trash pulls in The Vault are a bit tricky. Even when using your common mitigation skills, it's easy to get overwhelmed. The reason for this is many of the pulls are larger groups of enemies. These enemies hit hard regardless of being in large groups, so be prepared.
	<p><i><a href="http://www.gameskinny.com/zvod4/ffxiv-heavensward-sohm-al-dungeon-guide">by GabrielKross</a></i>
	</div>
	</div>
	<div class="col-md-8">
  <div class="col-sm-6">
	<iframe width="300" src="https://www.youtube.com/embed/1pFFfhHVHGY" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="col-sm-6">
	<h3>Dusk Vigil</h3>
	<p>
	
	Dusk Vigil, is the first new dungeon in the Heavensward expansion. In order to complete all Aether Currents for Coerthas Western Highlands, you'll need to complete the Dusk Vigil quest. Please keep in mind that enemies in this dungeon hit a lot harder than you'd expect.
		<p><i><a href="http://www.gameskinny.com/zvod4/ffxiv-heavensward-sohm-al-dungeon-guide">by GabrielKross</a></i>
	</div>
	</div>
	<div class="col-md-8">
  <div class="col-sm-6">
	<iframe width="300" src="https://www.youtube.com/embed/ILiZWa0QGJw" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="col-sm-6">
	<h3>The Great Gubal Library</h3>
	<p>
	The Great Gubal Library is the fourth dungeon you unlock in the Heavensward expansion. You unlock this dungeon at level 59. Keep in mind, every dungeon from Vault to the end will be hard on the tanks as far as incoming damage. Even with mitigation abilities, some of the enemies will put out a lot of damage.
</div>
</div>


</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap/docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
	
  </body>
</html>
