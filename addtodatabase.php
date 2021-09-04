<?php
echo"here";
include("db.php");
if(isset($_POST['Name']) && isset($_POST['fromdate']) && isset($_POST['mobile']) && isset($_POST['email']) && isset($_POST['selected']) && isset($_POST['timeslot']) && isset($_POST['comments']))
{
	$name=$_POST['Name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$timeslot=$_POST['timeslot'];
	$days=implode(" ",$_POST['selected']);
	$fromdate=$_POST['fromdate'];
	$comments=$_POST['comments'];
	//fetch data from booking master with perticular date and timeslot
	$query_select = "SELECT * from booking_master WHERE Fromdate='".$fromdate."' && Timeslot ='".$timeslot."'";
	$result_select = $con->query($query_select);
	if($result_select->num_rows > 0)
	{
		echo "Booking has already done for this date and time try another";
		
	}else{
	//insert data into booking master
	$query = "INSERT INTO booking_master(Name,Mobile,Email,Timeslot,Day,Comments,Fromdate) values('";
	$query .= $name . "','";
	$query .= $mobile . "','";
	$query .= $email . "','";
	$query .= $timeslot . "','";
	$query .= $days . "','";
	$query .= $comments . "','";
	$query .= $fromdate."')";
	
	$result = $con->query($query);
		
	if($result > 0)
	{
		echo "Booking successfully";	
	}
	else
	{
		echo "Booking Error Found!!!";
	}
	}
}else{
	echo"invalid access";
}
?>