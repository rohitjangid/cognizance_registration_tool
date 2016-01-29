<!DOCTYPE html>
<html lang="en">
	<head>
    <title>Controls - Cognizance 2014</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	<link href="css/style.css" rel="stylesheet">
	
  </head>
  <body>
	
	<?php
		@session_start();
		include 'include.php';
		$flag=isset($_SESSION['user']);	
		if($flag==false)
		{
			echo "<div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
				<div class='container'>
					<div class='row'>
						<div class='navbar-header col-md-4 col-md-offset-4' style='text-align:center;'>
							<a class='navbar-brand col-md-12' href='#'>Controls - Cognizance 2014</a>
						</div>
					</div>
				</div>
			</div>";
		}
		elseif($flag==true)
		{
			$user=$_SESSION['user'];
			$user=userdetails($user);
			$usertype=$user[0]['type'];
			if($usertype=="admin")
			{
				echo "<div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
					<div class='container'>
						<div class='navbar-header'>
							<a class='navbar-brand' href='#'>Welcome Admin</a>
						</div>
						<div class='collapse navbar-collapse'>
							<ul class='nav navbar-nav'>
								<li";if($activepage=="home"){ echo " class='active'";} echo"><a href='index.php'>Home</a></li>
								<li";if($activepage=="adduser"){ echo " class='active'";} echo"><a href='adduser.php'>Add-User</a></li>
								<li";if($activepage=="resetpassword"){ echo " class='active'";} echo"><a href='resetpassword.php'>Reset-Password</a></li>
								<li";if($activepage=="loguser"){ echo " class='active'";} echo"><a href='loguser.php'>Log-User</a></li>
								<li><a href='logout.php'>Logout</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>";
			}
			elseif($usertype=="user1")
			{
				echo "<div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
					<div class='container'>
						<div class='navbar-header'>
							<a class='navbar-brand' href='#'>Welcome Controls Team</a>
						</div>
						<div class='collapse navbar-collapse'>
							<ul class='nav navbar-nav'>
								<li";if($activepage=="home"){ echo " class='active'";} echo"><a href='index.php'>Home</a></li>
								<li";if($activepage=="counter1"){ echo " class='active'";} echo"><a href='counter1.php'>Counter 1</a></li>
								<li><a href='logout.php'>Logout</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>";
			}
			elseif($usertype=="user2")
			{
				echo "<div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
					<div class='container'>
						<div class='navbar-header'>
							<a class='navbar-brand' href='#'>Welcome Controls Team</a>
						</div>
						<div class='collapse navbar-collapse'>
							<ul class='nav navbar-nav'>
								<li";if($activepage=="home"){ echo " class='active'";} echo"><a href='index.php'>Home</a></li>
								<li";if($activepage=="counter2"){ echo " class='active'";} echo"><a href='counter2.php'>Counter 2</a></li>
								<li><a href='logout.php'>Logout</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>";
			}
			elseif($usertype=="user3")
			{
				echo "<div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
					<div class='container'>
						<div class='navbar-header'>
							<a class='navbar-brand' href='#'>Welcome Controls Team</a>
						</div>
						<div class='collapse navbar-collapse'>
							<ul class='nav navbar-nav'>
								<li";if($activepage=="home"){ echo " class='active'";} echo"><a href='index.php'>Home</a></li>
								<li";if($activepage=="counter3"){ echo " class='active'";} echo"><a href='counter3.php'>Counter 3</a></li>
								<li><a href='logout.php'>Logout</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>";
			}
			elseif($usertype=="acco")
			{
				echo "<div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
					<div class='container'>
						<div class='navbar-header'>
							<a class='navbar-brand' href='#'>Welcome Accommodation Team</a>
						</div>
						<div class='collapse navbar-collapse'>
							<ul class='nav navbar-nav'>
								<li";if($activepage=="home"){ echo " class='active'";} echo"><a href='index.php'>Home</a></li>
								<li";if($activepage=="acco"){ echo " class='active'";} echo"><a href='acco.php'>Accommodation</a></li>
								<li><a href='logout.php'>Logout</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>";
			}
		}
	?>
