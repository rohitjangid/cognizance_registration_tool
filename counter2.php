<?php
	session_start();
	$user=isset($_SESSION['user']);
	if($user==false)
	{
		header ('location: ./login.php');
	}
	$activepage="counter2";
	include("./header.php");

	if(isset($_POST['submit']))
	{
		$ddcount=$_POST['ddcount'];
		for($i=1;$i<=$ddcount;$i++)
		{
			$id="bankname".$i;
			$bankname[$i]=$_POST[$id];
			$id="ddnumber".$i;
			$ddnumber[$i]=$_POST[$id];
			$id="ddamount".$i;
			$ddamount[$i]=$_POST[$id];
		}
		$bankname=implode(";",$bankname);
		$ddnumber=implode(";",$ddnumber);
		$ddamount=implode(";",$ddamount);
		
		$partcount=$_POST['cidcount'];
		for($i=1;$i<=$partcount;$i++)
		{
			$id="event".$i;
			$event=$_POST[$id];
			$id="cogniid".$i;
			$cid=$_POST[$id];
			$con=dbconnect();
			mysqli_query($con,"UPDATE participant SET bankname='$bankname', ddnumber='$ddnumber', ddamount='$ddamount', last_counter='2', event='$event' WHERE cogni_id='$cid'");
		}
		$_SESSION['sucess']="Done";
	}
?>
<div class="container">


      <div class="starter-template">
        <h1>Control-2</h1>
		<br>
		
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" role="form" action="counter2.php" method="POST">
					<input type="number" name="cidcount" id="cidcount" value="1" hidden>
					<input type="number" name="ddcount" id="ddcount" value="1" hidden>
					<table class='table table-striped'>
						<thead>
							<tr>
								<th></th>
								<th>Cogni ID</th>
								<th>Participation Fees</th>
								<th>Workshop Fees</th>
								<th>Event/Workshop</th>
							</tr>
						</thead>
						<tbody class="appending-table1">
							<tr>
								<td>
									<span class="glyphicon glyphicon-plus addcid"></span>
								</td>
								<td>
									<div class="form-group">
										<label for="cogniid" class="col-sm-3 control-label">COG14/</label>
										<div class="col-sm-9 controls">
											<input type="number" class="form-control cid-control" id="cogniid1" name="cogniid1" data-count="1" required>
										</div>
									</div>
								</td>
								<td>
									<div class="form-group">
										<div class="col-sm-12 controls">
											<input type="number" class="form-control" id="pfees1" name="pfees1" value="0" disabled>
										</div>
									</div>
								</td>
								<td>
									<div class="form-group">
										<div class="col-sm-12 controls">
											<input type="number" class="form-control" id="wfees1" name="wfees1" value="0" disabled>
										</div>
									</div>
								</td>
								<td>
									<div class="form-group">
										<div class="col-sm-12 controls">
											<input type="text" class="form-control" id="event1" name="event1" value="" required>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="form-group">
						<label for="part_sum" class="col-sm-9 control-label">Total Sum</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" id="part_sum" name="part_sum" value="0" disabled>
						</div>
					</div>
					<table class='table table-striped'>
						<thead>
							<tr>
								<th></th>
								<th>DD Bank/Online</th>
								<th>DD Number/Receipt Number</th>
								<th>DD Amount/Receipt Amount</th>
							</tr>
						</thead>
						<tbody class="appending-table2">
							<tr>
								<td>
									<span class="glyphicon glyphicon-plus adddd"></span>
								</td>
								<td>
									<div class="form-group">
										<div class="col-sm-12 controls">
											<select class="form-control cid-control" id="bankname1" name="bankname1" data-count="1" required>
												<option value="Online">Online</option>
												<option value="Punjab National Bank">Punjab National Bank</option>
												<option value="State Bank of India">State Bank of India</option>
												<option value="Allahabad Bank">Allahabad Bank</option>
												<option value="Andhra Bank">Andhra Bank</option>
												<option value="Bank of Baroda">Bank of Baroda</option>
												<option value="Bank of India">Bank of India</option>
												<option value="Bank of Maharashtra">Bank of Maharashtra</option>
												<option value="Bhartiya Mahila Bank">Bhartiya Mahila Bank</option>
												<option value="Canara Bank">Canara Bank</option>
												<option value="Central Bank of India">Central Bank of India</option>
												<option value="Corporation Bank">Corporation Bank</option>
												<option value="Dena Bank">Dena Bank</option>
												<option value="IDBI Bank">IDBI Bank</option>
												<option value="Indian Bank">Indian Bank</option>
												<option value="Indian Overseas Bank">Indian Overseas Bank</option>
												<option value="Oriental Bank of Commerce">Oriental Bank of Commerce</option>
												<option value="Punjab and Sind Bank">Punjab and Sind Bank</option>
												<option value="Syndicate Bank">Syndicate Bank</option>
												<option value="UCO Bank">UCO Bank</option>
												<option value="Union Bank of India">Union Bank of India</option>
												<option value="United Bank of India">United Bank of India</option>
												<option value="Vijaya Bank">Vijaya Bank</option>
												<option value="State Bank of Bikaner & Jaipur">State Bank of Bikaner & Jaipur</option>
												<option value="State Bank of Hyderabad">State Bank of Hyderabad</option>
												<option value="State Bank of Mysore">State Bank of Mysore</option>
												<option value="State Bank of Patiala">State Bank of Patiala</option>
												<option value="State Bank of Travancore">State Bank of Travancore</option>
												<option value="State bank of Saurashtra">State bank of Saurashtra</option>
												<option value="State Bank of Indore">State Bank of Indore</option>
												<option value="Axis Bank">Axis Bank</option>
												<option value="Catholic Syrian Bank">Catholic Syrian Bank</option>
												<option value="City Union Bank">City Union Bank</option>
												<option value="Development Credit Bank">Development Credit Bank</option>
												<option value="Dhanlaxmi Bank">Dhanlaxmi Bank</option>
												<option value="Federal Bank">Federal Bank</option>
												<option value="HDFC Bank">HDFC Bank</option>
												<option value="ICICI Bank">ICICI Bank</option>
												<option value="Induslnd Bank">Induslnd Bank</option>
												<option value="ING Vysya Bank">ING Vysya Bank</option>
												<option value="Karnataka Bank">Karnataka Bank</option>
												<option value="Karur Vysya Bank">Karur Vysya Bank</option>
												<option value="Kotak Mahindra Bank">Kotak Mahindra Bank</option>
												<option value="Lakshmi Vilas Bank">Lakshmi Vilas Bank</option>
												<option value="Nainital Bank">Nainital Bank</option>
												<option value="Tamilnadu Mercantile Bank">Tamilnadu Mercantile Bank</option>
												<option value="South Indian Bank">South Indian Bank</option>
												<option value="YES Bank">YES Bank</option>
												<option value="UP Agro Corporation Bank">UP Agro Corporation Bank</option>
												<option value="Abu Dhabi Commercial Bank">Abu Dhabi Commercial Bank</option>
												<option value="Australia and New Zealand Bank">Australia and New Zealand Bank</option>
												<option value="Bank Internasional Indonesia">Bank Internasional Indonesia</option>
												<option value="Bank of America">Bank of America</option>
												<option value="Bank of Bahrain and Kuwait">Bank of Bahrain and Kuwait</option>
												<option value="Bank of Ceylon">Bank of Ceylon</option>
												<option value="Bank of Nova Scotia">Bank of Nova Scotia</option>
												<option value="Bank of Tokyo Mitsubishi">Bank of Tokyo Mitsubishi</option>
												<option value="Barclays Bank">Barclays Bank</option>
												<option value="BNP Paribas">BNP Paribas</option>
												<option value="Calyon Bank">Calyon Bank</option>
												<option value="Chinatrust Commercial Bank">Chinatrust Commercial Bank</option>
												<option value="Citibank">Citibank</option>
												<option value="Credit Suisse">Credit Suisse</option>
												<option value="Commonwealth Bank">Commonwealth Bank</option>
												<option value="DBS Bank">DBS Bank</option>
												<option value="HSBC">HSBC</option>
												<option value="JPMorgan Chase Bank">JPMorgan Chase Bank</option>
												<option value="Royal Bank of Scotland">Royal Bank of Scotland</option>
												<option value="Standard Chartered Bank">Standard Chartered Bank</option>
												<option value="State Bank of Mauritius">State Bank of Mauritius</option>
												<option value="UBS">UBS</option>
												<option value="Woori Bank">Woori Bank</option>
											</select>
										</div>
									</div>
								</td>
								<td>
									<div class="form-group">
										<div class="col-sm-12 controls">
											<input type="number" class="form-control" id="ddnumber1" name="ddnumber1">
										</div>
									</div>
								</td>
								<td>
									<div class="form-group">
										<div class="col-sm-12 controls">
											<input type="number" class="form-control" id="ddamount1" name="ddamount1">
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="form-group">
						<label for="part_sum" class="col-sm-9 control-label">Total Sum</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" id="dd_sum" name="dd_sum" value="0" disabled>
						</div>
					</div>
					<div class="checkbox col-sm-1">
						<input type="checkbox" name="flag" value="1" required> Chalaan Issued
					</div>
				  <button type="submit" name="submit" id="submit" class="btn btn-danger" disabled>Submit</button>
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