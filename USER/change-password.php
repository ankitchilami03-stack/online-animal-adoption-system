<?php
session_start();
ob_start();

$conn=mysqli_connect('localhost','root','','oaa1');
if(isset( $_SESSION['phone']))
{
	$phone=$_SESSION['phone'];
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>change password page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" /> 
<link href="CSS3/adopt.css" rel="stylesheet" type="text/css" media="all" />
<script src="../js/ak.js"></script>
 <script src="JS3/user.js"></script>
 </head>
 <body>
 <!..header section starts..>
 
 <header class="header">
 <a href="#" class="logo"><img src="IMAGES3/Logopny1..png"/></a>
 <nav class="navbar">
 <ul id="menu">
		<li><a href="userh.php">Home</a></li>
		<li ><a href="#">Adopt</a>
			
		  <div class="sub-menu1">
				<ul>
					<li><a style="color:white;" href="Adopt-now.php">Adopt Now</a></li>
		            <li><a style="color:white;" href="view-adoption.php">View Adoption</a></li>
				</ul>
		  </div>
		</li>
		
	<li class=""><a href="donate.php">Donate</a>

		<div class="sub-menu1">
				<ul>
					<li><a style="color:white;" href="donate.php">Donate Amount</a></li>
		            <li><a style="color:white;" href="donate-view.php">View Donate  Amount</a></li>
				</ul>
		  </div>
		</li>		
		
		
		<li ><a  href="give-feedback.php">Feedback</a>
			
		  <div class="sub-menu1">
				<ul>
					<li><a  href="give-feedback.php" style="color:white;">Give</a></li>
		            <li><a href="view-feedback.php" style="color:white;"  >View</a></li>
				</ul>
		  </div>
		</li>
		
		<li class="active"><a href="">Settings</a>
		 <div class="sub-menu1">
				<ul>
					<li><a style="color:white;" href="user-profile.php">Profile</a></li>
		            <li><a style="color:white; " href="change-password.php">Change password</a></li>
		            <li><a style="color:white;" href="../logout.php">logout</a></li>
				</ul>
		  </div>
		
		</li>
		
	</ul>
	
 </nav>
 </header>
  <script src="JS3/script.js"></script>
 <!..header section ends..>
 
 
 
 <!..home section starts..>
 

 
 
 
<div class="Main-div1">
		<div class="feedback-header">	
         <h3>Change Password</h3>
		</div>	
        <div class="container">
		    <form method="POST">
			<label>Old Password</label>
			<input class="input-field" type="text" name="oldpass" placeholder="Old Password"/>
			
			<label>New Password</label>
			<input  class="input-field" type="password" name="newpass" placeholder="New Password"/>
			
            <label>Confirm Password</label>
			<input  class="input-field" type="password" name="confpass" placeholder="Confirm Password"/>
			<br>
			<br>
			<br>
			<a href="userh.php"><input  class="submit-btn" type="submit" name="change" value="CHANGE PASSWORD"/></a>
			<a href="#"><input  class="submit-btn" type="reset"  value="CLEAR"/></a>
        
			</form>
		</div>
		
	  </div>
 
 
 <?php
 if(isset($_POST['change']))
 {
$sql="select * from users where phone='$phone'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$dbpass=$row['pass'];
$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$confpass=$_POST['confpass'];
 if($dbpass == $oldpass)
 {
	 if($dbpass!=$newpass && $newpass==$confpass)
	 {
		 $sql1="update users set pass='$newpass' where phone='$phone'";
		 $res=mysqli_query($conn,$sql1);
		 if($res)
		 {
	       echo "<script>";
		   echo "swal('Good','the new password is changed','success')";
		   echo "</script>";

	     }
	 }
	   else
	     {
		echo "<script>";
		echo "swal('Opps!!!','the old password and new password are same or  confirm password is does not matched','info')";
		echo "</script>";
		
	     }
 }	 
	 else
	 {
		echo "<script>";
		echo "swal('sorry','enter old password correctly','error')";
		echo "</script>";
	 }
 
 }

 
 ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
<!--scrool to top button-->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up"></i></button>
<!--scrool to top button code end-->








 </body>
 </html>
 <?php
}
else
{
	header('location:../login.php');
}
?>