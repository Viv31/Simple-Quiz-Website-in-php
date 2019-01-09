<?php
session_start();

	if(isset($_SESSION['email']));
	{
		
		unset($_SESSION['email']);
		//session_unset();
		header("loaction:index.php");
	}
	
?>
<?php
include("inc/connection.php");
if(isset($_POST['login']))
{
	extract($_POST);
	
	$email=strtolower($_POST['email']);
	$pass=$_POST['password'];
	
	$select_query="SELECT * FROM register WHERE email='$email' and password='$pass'";
	$res=mysqli_query($conn,$select_query);
	$row=mysqli_fetch_array($res);
	$user_id=$row["id"];
	$user_name=$row["firstname"];
	$last_name=$row["lastname"];
	
	if(mysqli_num_rows($res)>0){
		$_SESSION['email']=$email;
		$_SESSION['id']=$user_id;
         $_SESSION['name']=$user_name;
         $_SESSION['lname']=$last_name;
		header("location:home.php");
		
	}
	else
	{
		header("location:index.php?status=failed");
		
	}
}
?>