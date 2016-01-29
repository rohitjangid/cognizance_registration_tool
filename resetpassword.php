<?php
	session_start();
	$flag=isset($_SESSION['user']);
	if($flag==false){
		header ('location: ./login.php');
	}
	$activepage="resetpassword";
	include("./header.php");
	
	if(isset($_POST["resetpassword"]))
	{
		$username=$_POST["username"];
		$password=$_POST["password"];
		resetpassword($username,$password);
	}
?>

<div class="container">


    <div class="starter-template">
        <h1>Reset Password</h1>
		<br>
        <div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form class="form-horizontal" role="form" action="resetpassword.php" method="POST">
				  <div class="form-group">
					<label for="username" class="col-sm-3 control-label">Username</label>
					<div class="col-sm-9">
						<select class="form-control" id="username" name="username" required>
							<?php
								$con=dbconnect();
								$result = mysqli_query($con,"SELECT * FROM users");
								while($row = mysqli_fetch_array($result))
								{
									echo "<option value='".$row['user']."'>".$row['user']."</option>";
								}
							?>
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
					</div>
				  </div>
				  <button type="submit" name="resetpassword" class="btn btn-default">Reset</button>
				</form>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<?php
					if(isset($_SESSION['error']))
					{
						$error=$_SESSION['error'];
						echo "<div class='alert alert-danger'>
							$error
							</div>";
						unset($_SESSION['error']);
					}
					elseif(isset($_SESSION['success']))
					{
						$success=$_SESSION['success'];
						echo "<div class='alert alert-success'>
						$success
						</div>";
						unset($_SESSION['success']);
					}
				?>
			</div>
		</div>
    </div>

    
</div><!-- /.container -->	
<?php
	include("./footer.php");
?>