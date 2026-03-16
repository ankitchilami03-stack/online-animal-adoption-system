<?php
session_start();
ob_start();

 $conn=mysqli_connect("localhost","root","","oaa1");
 
if(isset($_POST['amount']) && $_POST['phone'])
{
	$name=$_POST['name'];
	$mail=$_POST['mail'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];  	
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$amount=$_POST['amount'];
	$d_id=$_POST['d_id'];

   
	
	$sql = "insert into donate values('','$name','$mail','$phone','$address','$age','$gender','$amount','completed')";
	$res=mysqli_query($conn,$sql);
	if($res)
	{
		echo "<script>";
		echo "swal('Animal donation Request Is Send','','success')";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "swal('Animal donation Request Is Send','','success')";
		echo "</script>";
	}
}




?>