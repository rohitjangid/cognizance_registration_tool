<?php

//Database connection
if(!function_exists('dbconnect')){
	function dbconnect()
	{
		// Create connection
		$con=mysqli_connect("localhost","root","","controls");

		// Check connection
		if (mysqli_connect_errno($con))
		{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else{
			return $con;
		}
	}
}
  
//Salt function
if(!function_exists('salt'))
{
	function salt( $length ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
		$size = strlen( $chars );
		$str="";
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
}

//user table details in array
if(!function_exists('userdetails'))
{
	function userdetails($user)
	{
		$con=dbconnect();
		$result=mysqli_query($con,"SELECT * FROM users WHERE user='$user'");
		$return=array();
		while($row=mysqli_fetch_array($result))
		{
			array_push($return, $row); 
		}
		return $return; //this will return data which will be used as $return[0]['index'];
	}
}

//student table details in array
if(!function_exists('studentdetails'))
{
	function studentdetails($cid)
	{
		$con=dbconnect();
		$result=mysqli_query($con,"SELECT * FROM student WHERE cogni_id='$cid'");
		$return=array();
		while($row=mysqli_fetch_array($result))
		{
			array_push($return, $row); 
		}
		return $return; //this will return data which will be used as $return[0]['index'];
	}
}

//participant table details in array
if(!function_exists('participantdetails'))
{
	function participantdetails($cid)
	{
		$con=dbconnect();
		$result=mysqli_query($con,"SELECT * FROM participant WHERE cogni_id='$cid'");
		$return=array();
		while($row=mysqli_fetch_array($result))
		{
			array_push($return, $row); 
		}
		return $return; //this will return data which will be used as $return[0]['index'];
	}
}

//login function
if(!function_exists('login'))
{
	function login($username,$pass)
	{
		@session_start();
		@$user=userdetails($username);
		@$salt=$user[0]['salt'];
		@$password=$user[0]['password'];
		if(md5($salt.md5($pass))==$password)
		{
			$_SESSION['user']=$username;
			header("location: index.php");
		}
		else
		{
			$_SESSION['error']="Invalid Username or Password";
			// header("location: login.php");
		}
	}
}

//adduser function
if(!function_exists('adduser'))
{
	function adduser($username,$password, $usertype)
	{
		@session_start();
		$salt=salt(8);
		$user=userdetails($username);
		$pass=md5($salt.md5($password));
		if(count($user)==0)
		{
			$con=dbconnect();
			mysqli_query($con,"INSERT INTO users (user, salt, password, type) VALUES ('$username', '$salt', '$pass', '$usertype')");
			$_SESSION['success']="User added";
			// header("location: adduser.php");
		}
		else
		{
			$_SESSION['error']="Username already exist";
			// header("location: adduser.php");
		}
	}
}

//resetpassword function
if(!function_exists('resetpassword'))
{
	function resetpassword($username,$password)
	{
		@session_start();
		$salt=salt(8);
		$user=userdetails($username);
		if(count($user)==1)
		{
			$salt=$user[0]["salt"];
			$pass=md5($salt.md5($password));
			$con=dbconnect();
			mysqli_query($con,"INSERT INTO users (password) VALUES ('$password')");
			$_SESSION['success']="Password reset";
			// header("location: resetpassword.php");
		}
		else
		{
			$_SESSION['error']="Invalid Username";
			// header("location: resetpassword.php");
		}
	}
}

//loguser function
if(!function_exists('loguser'))
{
	function loguser($username)
	{
		@session_start();
		$user=userdetails($username);
		if(count($user)==1)
		{
			$_SESSION['user']=$username;
			header("location: index.php");
		}
		else
		{
			$_SESSION['error']="Invalid Username";
			// header("location: resetpassword.php");
		}
	}
}

//counter1 function
if(!function_exists('counter1'))
{
	function counter1($cid, $noc, $registrationreceipt, $payment)
	{
		@session_start();
		$student=studentdetails($cid);
		if(count($student)==1)
		{
			$fname=$student[0]['first_name'];
			$lname=$student[0]['last_name'];
			$name=$fname." ".$lname;
			$college=$student[0]['collegeName'];
			$mobile=$student[0]['mobileNo'];
			$email=$student[0]['email'];
			$pfees=$student[0]['participation_fees'];
			$wfees=$student[0]['workshop_fees'];
			$con=dbconnect();
			mysqli_query($con,"INSERT INTO participant (cogni_id, name, collegeName, mobileNo, email, payment, participation_fees, workshop_fees, noc, registration_receipt, last_counter) 
			VALUES ('$cid','$name','$college','$mobile','$email','$payment','$pfees','$wfees','$noc','$registrationreceipt','1')");
			$_SESSION['success']="Done";
		}
		else
		{
			$_SESSION['error']="Something went wrong";
			// header("location: resetpassword.php");
		}
	}
}

//counter2 function
if(!function_exists('counter3'))
{
	function counter3($cid, $idcard, $kit)
	{
		@session_start();
		$student=studentdetails($cid);
		if(count($student)==1)
		{
			$con=dbconnect();
			mysqli_query($con,"UPDATE participant SET idcard='$idcard', kit='$kit', last_counter='3' WHERE cogni_id='$cid'");
			$_SESSION['success']="Done";
		}
		else
		{
			$_SESSION['error']="Something went wrong";
			// header("location: resetpassword.php");
		}
	}
}

//acco function
if(!function_exists('acco'))
{
	function acco($cid, $bhawan, $room)
	{
		@session_start();
		$student=studentdetails($cid);
		if(count($student)==1)
		{
			$con=dbconnect();
			mysqli_query($con,"UPDATE participant SET bhawan='$bhawan', room='$room' WHERE cogni_id='$cid'");
			$_SESSION['success']="Done";
		}
		else
		{
			$_SESSION['error']="Something went wrong";
			// header("location: resetpassword.php");
		}
	}
}


//partcount function
if(!function_exists('partcount'))
{
	function partcount()
	{
		$con=dbconnect();
		$result=mysqli_query($con,"SELECT * FROM participant WHERE last_counter='3'");
		$count=0;
		while($row=mysqli_fetch_array($result))
		{
			$count++;
		}
		return $count;
	}
}
?>