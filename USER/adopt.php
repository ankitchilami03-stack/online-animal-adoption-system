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
<title>cowshed adopt page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" /> 
<link href="CSS3/adopt.css" rel="stylesheet" type="text/css" media="all" />

 <script src="JS3/user.js"></script>
 </head>
 <body>
 <!..header section starts..>
 
 <header class="header">
 <a href="#" class="logo"><img src="IMAGES3/Logopny1..png"/></a>
 <nav class="navbar">
 <ul id="menu">
		<li><a href="userh.php">Home</a></li>
		<li class="active"><a href="#">Adopt</a>
			
		  <div class="sub-menu1">
				<ul>
					<li><a style="color:white;" href="Adopt-now.php">Adopt Now</a></li>
		            <li><a style="color:white;" href="view-adoption.php">View Adoption</a></li>
				</ul>
		  </div>
		</li>
		
				<li class=""><a href="#">Donate</a>

		<div class="sub-menu1">
				<ul>
					<li><a style="color:white;" href="donate.php">Donate Amount</a></li>
		            <li><a style="color:white;" href="donate-view.php">View Donate  Amount</a></li>
				</ul>
		  </div>
		</li>
		
		
		
		<li><a  href="">Feedback</a>
			
		  <div class="sub-menu1">
				<ul>
					<li><a href="give-feedback.php" >Give</a></li>
		            <li><a  style="color:white;" href="view-feedback.php" >View</a></li>
				</ul>
		  </div>
		</li>
		
		<li><a href="">Settings</a>
		 <div class="sub-menu1">
				<ul>
					<li><a style="color:white;" href="">Profile</a></li>
		            <li><a style="color:white; " href="">Change password</a></li>
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
 

 <!--our animals-->
<section class="products" id="products">
<h1 class="heading"> View<span> Animals</span></h1>
   <h2><a class="back-link" href="Adopt-now.php"><i class="fa fa-arrow-left"></i></a></h2>
<div class="product-slider" style="width:120%;display:flex;flex-wrap:wrap;">
<?php   
if(isset($_GET['type']))
{
	 $type = $_GET['type'];
$sql="select * from animal where type='$type'";
$res=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res))
{

?>
<div class="wrapper">
<div class="box" style="top:-10px;">
<input type="hidden" name="a_id" value=<?php echo $row['a_id'];?>"/>
  <?php echo '<img src="data:imgage/jpeg;base64,'.base64_encode($row['image']).'"width="360px" height="700"/>';?>
  <h3><?php echo $row['aname'];?></h3>
  <div class="price">Animal daily charge:<?php echo $row['age'];?></div>
  <div class="stars">
  <i class="fas fa-star"></i>
  <i class="fas fa-star"></i>
  <i class="fas fa-star"></i>
  <i class="fas fa-star"></i>
  <i class="fas fa-star-half"></i>
 </div>
 <a href="view-more.php?a_id=<?php echo $row['a_id'];?>" class="bt"></a>
 <div class="buy">
           <?php
		   if($row['qunt']==0)
		   {
			 ?>
             <a class="btn" style="background-color:lightblue;pointer-events:none;" href="adoption-forn.php?a_id=<?php echo $row['a_id']; ?>">Adopted</a>
            <?php			 
		   }
		   else
		   {
			  ?>
           <a class="btn" style="margin-top:1rem;display:inline-block;padding:1rem 2rem;font-size:1.4rem;border-radius:.5rem;border:.2rem solid var(--black);color:var(--black);cursor:pointer;background:orange;"href="view-more.php?a_id=<?php echo $row['a_id']; ?>">Adopt Now</a>
            <?php			
			   
		   }
		   
		   ?>
		   
		   </div>
 </div>

 </div>
 <?php
}
}
 ?>
 </div>

 
 <!--our animals ends-->

 <!..home section end..>
 <!..features section starts..>

  
 
 
 
 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
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