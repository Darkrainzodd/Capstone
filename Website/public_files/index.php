<?php
include '../lib/common.php';
include '../lib/db.php'; 
include '../lib/functions.php';
include '../lib/User.php';

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

    <title>Game Over X</title>

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


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="images/ffxiv-carousel.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><!-- Headline for first slide, not required atm --></h1>
              <p>Do it for Eorzea! Champion of Light!</p>
              <p><a class="btn btn-lg btn-primary" href="#" 
			  role="button">Jump to News</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="images/wow-carousel.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>World of Warcraft</h1>
              <p>Get the dungeon guides and walkthroughs you require!</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Head to Guides</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="images/splatoon-carousel.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Splatoon</h1>
              <p>Need help? We've got your back!</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Go to Forums</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->

        <div class="col-md-8">
<div class="col-sm-6">
<!-- REMOVING IMAGES FOR NOW, WILL CREATE SOME IMG HEADERS LATER -->
         <!--  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140"> -->
          <h2>News</h2>
          <p>Patch 3.3 Dungeons (FFXIV)</p>
<p>New EQ2 Decor(Everquest 2)</p>
<p>World of Warcraft Dying?</p>
<p>FFXIV Heavensward</p>
<p>Rift - Is it alive?</p>
          <p><a class="btn btn-default" href="#" role="button">View News Archive &raquo;</a></p>
</div>
<div class="col-sm-6">
<!-- REMOVING IMAGES FOR NOW, WILL CREATE SOME IMG HEADERS LATER -->
         <!--  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140"> -->
          <h2>Games</h2>
				<p>Diablo III </p>
        		<p>Final Fantasy 14</p>
				<p>RIFT</p>
				<p>Splatoon</p>
				<p>World of Warcraft</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
</div>
        </div><!-- /.col-lg-4 -->
</div><!-- ENDING OF CONTIANER -->

 <div class="container marketing">
<br />
	<!-- FOOTER -->
	<footer>
	  	<?php
			// Display the page.
			include '../templates/template-page.php';
		?>
	</footer>

  </div><!-- /.container -->

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
