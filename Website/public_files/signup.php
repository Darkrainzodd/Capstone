<!DOCTYPE html>

<?php
	// include shared code
include '../lib/common.php';
include '../lib/db.php';
include '../lib/functions.php';
include '../lib/User.php';

// start or continue session so the CAPTCHA text stored in $_SESSION is
// accessible
session_start();
header('Cache-control: private');

// prepare the registration form's HTML
ob_start();
?>

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

	<!-- Message alert when username already exists -->
  <script>
  function warning(){
	alert("Sorry, that account name is already taken. Please try another one")
	}
	</script>
	
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
   <div class="">

      <form class="form-signin" method="post"
		action="redirection.php">
        
		<h2 class="form-signin-heading">Join the fold!</h2>
		
		<label for="username" class="sr-only">Username</label>
		<input	type="name" name="username" id="username" 
		class="form-control" placeholder="Username" required autofocus 
		value="<?php if (isset($_POST['username']))
		echo htmlspecialchars($_POST['username']); ?>">
		
        <label for="email" class="sr-only">Email address</label>
        <input type="email" name="email" id="email" class="form-control" 
		value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" 
		placeholder="Email address"></input>
		
        <label for="password1" class="sr-only">Password</label>
        <input type="password" name="password1" id="password1" 
		class="form-control" placeholder="Password" required />
		
		<label for="password2" class="sr-only">Password</label>
        <input type="password" name="password2" id="password2" 
		class="form-control" placeholder="Confirm Password" required />
		
		<label for="captcha">Verify</label>
		<td>Enter text seen in this image</td><br/ > 
		<img src="img/captcha.php?nocache=<?php echo time(); ?>" alt="" /> <br />
		<input type="text" name="captcha" id="captcha" /> <br />
		&nbsp;
		&nbsp;
		
        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign Up</button>
		<input type="hidden" name="submitted" value="1"/>
      </form>
	  
	  <?php
$form = ob_get_clean(); 

// show the form if this is the first time the page is viewed
if (!isset($_POST['submitted']))
{
    $GLOBALS['TEMPLATE']['content'] = $form;
}

// otherwise process incoming data
else
{
	
    // validate password
    $password1 = (isset($_POST['password1'])) ? $_POST['password1'] : '';
    $password2 = (isset($_POST['password2'])) ? $_POST['password2'] : '';
    $password = ($password1 && $password1 == $password2) ?
        sha1($password1) : '';

    // validate CAPTCHA
    $captcha = (isset($_POST['captcha']) && 
        strtoupper($_POST['captcha']) == $_SESSION['captcha']);

    // add the record if all input validates
    if ($password &&
        $captcha &&
        User::validateUsername($_POST['username']) &&
        User::validateEmailAddr($_POST['email']))
    {
        // make sure the user doesn't already exist
        $user = User::getByUsername($_POST['username']);
        if ($user->userId)
        {
            $GLOBALS['TEMPLATE']['content'] = '<p><strong>Sorry, that ' .
                'account already exists.</strong></p> <p>Please try a ' .
                'different username.</p>';
            $GLOBALS['TEMPLATE']['content'] .= $form;
        }
        else
        {
            // create an inactive user record
            $u = new User();
            $u->username = $_POST['username'];
            $u->password = $password;
            $u->emailAddr = $_POST['email'];
            $token = $u->setPending();
			
			
			            $GLOBALS['TEMPLATE']['content'] = '<p><strong>Thank you for ' .
                'registering.</strong></p> <p>Be sure to verify your ' .
                'account by visiting <a href="redirection.php?uid=' . 
                $u->userId . '&token=' . $token . '">redirection.php?uid=' .
                $u->userId . '&token=' . $token . '</a></p>';
         }
    }
    // there was invalid data
    else
    {
        $GLOBALS['TEMPLATE']['content'] .= '<p><strong>You provided some ' .
            'invalid data.</strong></p> <p>Please fill in all fields ' .
            'correctly so we can register your user account.</p>';
        $GLOBALS['TEMPLATE']['content'] .= $form;
    }
}
// display the page
include '../templates/template-page.php';
?>
	  
    </div> <!-- /container -->
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
