<?php
	session_start();
	$flag=isset($_SESSION['user']);
	if($flag==false){
		header ('location: ./login.php');
	}
	$activepage="adduser";
	include("./header.php");
	
	if(isset($_POST["adduser"]))
	{
		$username=$_POST["username"];
		$password=$_POST["password"];
		$usertype=$_POST["usertype"];
		adduser($username,$password,$usertype);
	}
?>

<div class="container">


    <div class="starter-template">
        <h1>Add New User</h1>
		<br>
        <div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form class="form-horizontal" role="form" action="adduser.php" method="POST">
				  <div class="form-group">
					<label for="username" class="col-sm-3 control-label">Username</label>
					<div class="col-sm-9">
						<input type="username" class="form-control" id="username" name="username" placeholder="Enter Username" required>
					</div>
				  </div>
				  <div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" required>
					</div>
				  </div>
				  <div class="form-group">
					<label for="usertype" class="col-sm-3 control-label">Usertype</label>
					<div class="col-sm-9">
						<select class="form-control" id="usertype" name="usertype" required>
							<option value="user1">Control-1</option>
							<option value="user2">Control-2</option>
							<option value="user3">Control-3</option>
							<option value="acco">Accommodation</option>
							<option value="admin">Admin</option>
						</select>
					</div>
				  </div>
				  <button type="submit" name="adduser" class="btn btn-default">Add User</button>
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