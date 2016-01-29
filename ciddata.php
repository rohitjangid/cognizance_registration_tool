<?php
	include 'include.php';
	$cid=$_POST['cid'];
	$participant=participantdetails($cid);
	if(count($participant)!=0)
	{
		if($participant[0]['last_counter']==1)
		{
			$pfees=$participant[0]['participation_fees'];
			$wfees=$participant[0]['workshop_fees'];
			$data=$pfees.";".$wfees;
			echo $data;
		}
		elseif($participant[0]['last_counter']<1)
		{
			echo "Visit Counter 1";
		}
		else
		{
			echo "Already done with this counter";
		}
	}
	else
	{
		echo "Invalid Cogni ID";
	}
?>