<?php
	session_start();
	$user=isset($_SESSION['user']);
	if($user==false)
	{
		header ('location: ./login.php');
	}
	$activepage="home";
	include("./header.php");
?>
<div class="container">


      <div class="starter-template">
        <h1>Welcome</h1>
        <p class="lead"></p>
		<?php
			if($usertype=="admin")
			{
				echo "<div class='row'>
				<div class='col-md-4 col-md-offset-4'>
				<table class='table table-striped'>
					<thead>
						<tr>
							<!--th>Event</th>
							<th>Hide</th-->
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								Total Participant Done:
							</td>
							<td>";
								echo partcount();
							echo "</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>";
			}
		?>
      </div>

    
</div><!-- /.container -->	
<?php
	include("./footer.php");
?>