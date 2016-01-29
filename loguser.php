<?php
	session_start();
	$flag=isset($_SESSION['user']);
	if($flag==false){
		header ('location: ./login.php');
	}
	$activepage="loguser";
	include("./header.php");
	
	if(isset($_POST["loguser"]))
	{
		$username=$_POST["username"];
		loguser($username);
	}
?>

<div class="container">


    <div class="starter-template">
        <h1>Log User</h1>
		<br>
        <div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form class="form-horizontal" role="form" action="loguser.php" method="POST">
				  <div class="form-group">
					<label for="username" class="col-sm-3 control-label">Username</label>
					<div class="col-sm-9">
						<select class="form-control" id="username" name="username" required>
							<?php
								$con=dbconnect();
								$result = mysqli_query($con,"SELECT * FROM users");
								while($row = mysqli_fetch_array($result))
								{
									if($row['user']=='') continue;
									echo "<option value='".$row['user']."'>".$row['user']."</option>";
								}
							?>
						</select>
					</div>
				  </div>
				  <button type="submit" name="loguser" class="btn btn-default">Log User</button>
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
				?>
			</div>
		</div>
    </div>

    
</div><!-- /.container -->	
<?php
	include("./footer.php");
?>