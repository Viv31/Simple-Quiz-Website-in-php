<?php
session_start();

	if(isset($_SESSION['email']));
	{
		
		unset($_SESSION['email']);
		//session_unset();
		header("loaction:index.php");
	}
	
?>



<style>
.pan{

	background-color: #337ab7;
	color: white;
	height:100px;
	text-align: center;
	font-size: 30px;
	text-shadow: 2px 2px 3px #FF0000;

}
</style>

<style>
body{
	background-image: url('img/5.jpg');
	background-size: 100%;
	
}
.foot{
	height:70px;
}
</style>






<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/formvalid.js"></script>
<script src="js/loginvalid.js"></script>
<script src="js/emailpassvalid.js"></script>
<link rel="stylesheet" href="css/formcss.css">
<link rel="stylesheet" type="text/css" href="css/media.css">
<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">-->
<br>
<br><br>
<div class="container">

<div class="panel panel-primary">
    <div class="panel-body pan "><h1>QuiZWORLD<h1></div>
  </div>
<!--div for showing popup messages-->
<div class="modal fade" id="Failed" role="dialog">
    <div class="modal-dialog">
    
     
      <div class="modal-content">
        
        <div class="modal-body">
        	<!--Dynamic paragraph which takes value from php variable-->
          <p id="msg"  class="text-primary text-center"></p>
        </div>
        
      </div>
      
    </div>
  </div>

  					<?php 
  					/*
						if condition for multiple status 
  					*/
                        if(isset($_GET['status']) AND $_GET['status']=="failed")
                        {
                          $message="Invalid Username/Password!!!";
                             
                        }
                        if(isset($_GET['status']) AND $_GET['status']=="success")
                        {
                          $message="You are Registered Successfully!!!";
                             
                        }


                     ?>
<script>
$( document ).ready(function() {
	/*  id for message in paragraph */
    $("#msg").html("<?php echo $message; ?>");
    /*
id of status which is coming from header location in php 
    */
    $('#Failed').modal('show'); 
    setTimeout("$('#Failed').modal('hide'); ", 4000); 

});
</script>


	<div class="row">
		<div class="col-md-6 col-xs-6">
		<div class="panel panel-primary">
    <div class="panel-heading">Register Form </div>
    <div class="panel-body"> 

			<form class="form-register" method="POST" id="register" action="reg.php" onsubmit="return checkUser();">


<label for="firstname">First Name:</label>
			<div class="form-group">
				<input class="form-control" placeholder="Please Insert Your Firstname" type="text" name="firstname" id="firstname" pattern="^[a-zA-Z]*$" title="Only letters are required" autocomplete="off" />
					<div id="firstnamechk" class="popup_error"></div>
			</div>
<label for="lastname">Last Name:</label>
<div class="form-group">
	<input class="form-control" placeholder="Please Insert Your Lastname" type="text" name="lastname" id="lastname" pattern="^[a-zA-Z]*$"  title="Only letters are required" autocomplete="off"/>
		<div id="lastnamechk" class="popup_error"></div>
</div>

<label for="email">Email:</label>
<div class="form-group">
	<input class="form-control" placeholder="your@email.com" type="email" name="email" id="email" pattern="[aA-zZ0-9._%+-]+@[aA-zZ0-9.-]+\.[aA-zZ]{2,3}$" title="Email should like abc@gmail.com" autocomplete="off"  onkeyup="checkemail();" />
		<div id="chkemail" class="popup_error"></div>
		 <span id="email_status"></span>
		<span id="msg"></span>
		
</div>

<label for="pass">Password:</label>
<div class="form-group">
	<input class="form-control" placeholder="Insert a Password " type="password" name="password" id="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" />
		<div id="chkpwd" class="popup_error"></div>
		<input type="checkbox" onclick="ShowPass()">&nbsp; &nbsp;show password
		<p class="text-danger">(*required one number and one uppercase and lowercase letter, and at least 8 or more characters") </p>
		
		
</div>

<label for="Cpass">Confirm Password:</label>
<div class="form-group">
	<input class="form-control" placeholder="Confirm Your Password" type="password" name="cpassword" id="conf_pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password should same as above field"  autocomplete="off"/>
	<input type="checkbox" onclick="ShowPassconf()">&nbsp; &nbsp;show password
	<div id="cpwd" class="popup_error"></div>

	
	<p class="text-danger">(*password should same as above field) </p>
</div>
<?php
if(isset($_SESSION['error']))
{
	echo $_SESSION['error'];
}
else
{

}
?>



<div class="form-group">
<input class="btn btn-primary" type="submit" name="btnSubmit" value="Submit" onclick="SubMIT();"/>
</div>
</form></div>
</div>
</div>

<div class="col-md-6 col-xs-6">
		<div class="panel panel-primary">
    <div class="panel-heading">Login Form </div>
    <div class="panel-body"> 
	<!--login Form starts here-->
	<form class="form-login" method="post" id="login" action="login_sub.php" onsubmit=" return logvalid();">
	
	
	<label for="Email">Email:</label>
	<div class="form-group" >
	
	<input class="form-control" placeholder="please enter your email address" type="email" name="email" id="logemail" pattern="[aA-zZ0-9._%+-]+@[aA-zZ0-9.-]+\.[aA-zZ]{2,3}$" title="email sholud like abc@gmail.com" autocomplete="off" >
	<div id="logemailchk" class="popup_error"></div>
	
	
	</div>
	
	<label for="pass">Password:</label>
	<div class="form-group" >
	
	<input class="form-control" placeholder="please enter your password" type="password" name="password" id="logpwd" autocomplete="off">
	<input type="checkbox" onclick="ShowPasslog();">&nbsp; &nbsp;show password
	<div id="logpasschk" class="popup_error"></div>
	
	</div>
	<div class="form-group">
<input class="btn btn-primary" type="submit" name="login" value="Submit"/>
</div>
	
	
	</form>
</div>
</div>
</div>
</div>
 <div class="panel-footer foot"><b>Designed & Developed by :
<span style='float:right;'>Vaibhav Gangrade</b></span><br>
<span style='float:right;'>Vaibhav Gangrade</b></span>
 </div>
</div>

</html>