<?php
	session_start();
	$user=isset($_SESSION['user']);
	if($user==false)
	{
		header ('location: ./login.php');
	}
	$activepage="counter3";
	include("./header.php");
	$flag=0;
	if(isset($_POST['search']))
	{
		$cid=$_POST['cogniid'];
		$participant=participantdetails($cid);
		if(@$participant[0]['last_counter']==2)
		{
			$student=studentdetails($cid);
			$flag=count($student);
			if($flag==0)
			{
				$student=false;
			}
		}
		else
		{
			$_SESSION['error']="This is wrong counter";
		}
	}
	if(isset($_POST['submit']))
	{
		$cid=$_POST['cid'];
		$idcard=$_POST['idcard'];
		$kit=$_POST['kit'];
		counter3($cid, $idcard, $kit);
	}
?>
<div class="container">


      <div class="starter-template">
        <h1>Control-3</h1>
		<br>
        <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form class="form-horizontal" role="form" action="counter3.php" method="POST">
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
			<div class="col-md-2 col-md-offset-5">
				<form class="form-horizontal" role="form" action="counter3.php" method="POST">
					<input type="hidden" name="cid" value="<?php echo $student[0]['cogni_id']?>">
					<div class="checkbox col-sm-12">
						<input type="checkbox" name="idcard" value="1" <?php if(@$participant[0]['idcard']) echo "checked";?> required> ID-Card (Sr. No: <b><?php echo @$participant[0]['id']?></b> ) (<b><?php if(@$participant[0]['participation_fees']=='2000'){echo "Acco";} else {echo "Non-acco";}?></b>)
					</div>
					<div class="checkbox col-sm-12">
						<input type="checkbox" name="kit" value="1" <?php if(@$participant[0]['kit']) echo "checked";?> required> Kit
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