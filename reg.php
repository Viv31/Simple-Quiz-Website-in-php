<?php
session_start();
include("inc/connection.php");
?>
<?php
if(isset($_POST['btnSubmit'])){
	//extract($_POST);
	$firstname=ucfirst($_POST['firstname']);
	$lastname=ucfirst($_POST['lastname']);
	$email=strtolower($_POST['email']);
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	
	

	if(empty($firstname))
	{
		 $error.="<p style='color:red';>*name must be filled out.</p>";
		echo"<br>";
		$_SESSION['error']=$error;
		
	}

	if(empty($lastname))
	{
		 $error.="<p style='color:red';>*lastname must be filled out.</p>";
		echo"<br>";
		$_SESSION['error']=$error;
		
	}
	if(empty($email))
	{
		 $error.="<p style='color:red';>*email must be filled out.</p>";
		echo"<br>";
		$_SESSION['error']=$error;
		
	}
	if(empty($password))
	{
	 	 $error.="<p style='color:red';>*password must be filled out.</p>";
		echo"<br>";
		$_SESSION['error']=$error;
		

		

	}
	if(empty($cpassword))
	{
		 $error.="<p style='color:red';>*cpassword must be filled out.</p>";
		$_SESSION['error']=$error;

		header("location:index.php");
	}

	else{
		
		

	
	$select_query="SELECT * FROM register WHERE email='".$email."' and password='".$password."'";
	$res1=mysqli_query($conn,$select_query);
	if(mysqli_num_rows($res1)>0)
	{
		echo"email is already exixst";
		header('Refresh: 1; url=index.php');
		
	}




	else{
	
	$insert_query="INSERT INTO register(firstname,lastname,email,password,cpassword)VALUES('$firstname','$lastname','$email','$password','$cpassword')";
	$res=mysqli_query($conn,$insert_query);
	//echo $insert_query;
	if($res!=true)
	{
		die("unable to insert your data");
	}
	else
	{
		/*echo"<script type='text/javascript'>document.write('<h1>your data is submitted</h1>');
		window.location='index.php';
		</script>";*/

		header("location:index.php?status=success");
	}
	
}
}

}

?>