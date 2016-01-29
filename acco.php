<?php
	session_start();
	$user=isset($_SESSION['user']);
	if($user==false)
	{
		header ('location: ./login.php');
	}
	$activepage="acco";
	include("./header.php");
	$flag=0;
	if(isset($_POST['search']))
	{
		$cid=$_POST['cogniid'];
		$participant=participantdetails($cid);
		if(@$participant[0]['last_counter']==3)
		{
			if(@$participant[0]['participation_fees']=='2000')
			{
				$_SESSION['success']="Accommodation can be allotted";
				$flag=true;
			}
		}
		else
		{
			$_SESSION['error']="This Cogni ID yet not passed from counter 3";
		}
	}
	if(isset($_POST['submit']))
	{
		$cid=$_POST['cid'];
		$bhawan=$_POST['bhawan'];
		$room=$_POST['room'];
		acco($cid, $bhawan, $room);
	}
?>
<div class="container">


      <div class="starter-template">
        <h1>Accommodation</h1>
		<br>
        <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form class="form-horizontal" role="form" action="acco.php" method="POST">
				  <div class="form-group">
					<label for="cogniid" class="col-sm-4 control-label">COGNI ID: COG14/</label>
					<div class="col-sm-4 controls">
						<input type="number" class="form-control" id="cogniid" name="cogniid" required>
					</div>
				  </div>
				  <button type="submit" name="search" class="btn btn-default">Search</button>
				</form>
			</div>
		</div>
		<br/>
		<?php
		if ($flag)
		{
		?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form class="form-horizontal" role="form" action="acco.php" method="POST">
					<input type="hidden" name="cid" value="<?php echo $participant[0]['cogni_id']?>">
					<div class="form-group">
						<label for="bhawan" class="col-sm-4 control-label">Bhawan Name</label>
						<div class="col-sm-4 controls">
							<input type="text" class="form-control" id="bhawan" name="bhawan" value="<?php if(@$participant[0]['bhawan']) echo $participant[0]['bhawan'];?>" placeholder="Bhawan">
						</div>
					</div>
					<div class="form-group">
						<label for="room" class="col-sm-4 control-label">Room No.</label>
						<div class="col-sm-4 controls">
							<input type="text" class="form-control" id="room" name="room" value="<?php if(@$participant[0]['room']) echo $participant[0]['room'];?>" placeholder="Room">
						</div>
					</div>
				  <button type="submit" name="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
		<?php
		}
		?>
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
						$error=$_SESSION['success'];
						echo "<div class='alert alert-success'>
							$error
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