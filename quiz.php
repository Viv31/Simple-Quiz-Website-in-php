<?php
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
?>
<html lang="en">
<head>
  <title>Web quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bactotop.css">
  <script src="js/backtotop.js"></script>
  <script src="js/timer.js"></script>

<div class="box">
<div id="timer"></div>
</div>
<br><br>
<style>
.box
{
border:2px solid black;
		background-color: black;
		height: 50px;
		font-size: 20px;
		color: white;
		text-align: right;
		padding-right: 5px;
		position: fixed;
		width: 100%;
#timer{
			font-size: 20px;
		color: white;
		text-align: right;
		padding-right: 5px;
		
}}
	
</style>
<style>
	body
{
	background-image: url('8.jpg');
}

</style>
<!--
Preventing to go back 
-->
<script>
	history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
	</script>
<style>
.alt{
width:100%;
color:black;
background-color: white;
}
.alt:hover{
background-color: #d9edf7;
 cursor:pointer;
 }

.lab{
	width:100%;
	height:50px;
	padding: 3px;
}
.pb{
	background-color:#337386;
	box-shadow: 3px 3px 3px 3px  #888888;
	padding-top: 0px;
	font-size: 12px;
}
.pen{
		padding:0px;
}
</style>
	<script>
$('#chk').click(function() {
	alert('click');
    //$(this).find('input[type="radio"]').attr('checked', 'checked');
    if($(this).find('input[type="radio"]').is(':checked')){
        
       $(this).find('input[type="radio"]').attr('checked', false);
    }
    else{
           
       $(this).find('input[type="radio"]').attr('checked', true);
    }
    
});
</script>
<script>
var total_seconds =5400;
var c_minutes=parseInt(total_seconds/60);
var c_seconds=parseInt(total_seconds%60);
function CheckTime()
{
document.getElementById('timer').innerHTML='TIME LEFT:'+' '+ c_minutes+'   ' + 'min'+' '+ c_seconds+'  ' + 'sec';
if(total_seconds<=30){
{
 	timer.style.color='#f90'
 }
}
if(total_seconds<=10){

 {timer.style.color='red'}
}
if(total_seconds<=0){

			//alert("Sorry your time is over!!!");
        setTimeout('document.quiz.submit()',1);
        /*
        document.quiz.submit() is used for submitting our data to our form here quiz is form name and id 
        */
    }
    else{
    total_seconds=total_seconds-1;
    c_minutes=parseInt(total_seconds/60);
    c_seconds=parseInt(total_seconds%60); 
     setTimeout("CheckTime()",1000);
	}
}
setTimeout("CheckTime()",1000);
   </script>
<?php
  include("inc/connection.php");
?>
<br>
<br>
<div class="container">
<form action="ans.php" id="quiz"  name="quiz" method="POST">
<?php
$select_query="SELECT * FROM questions";
$res=mysqli_query($conn,$select_query);
if(mysqli_num_rows($res)>0)
{
	while($rs=mysqli_fetch_array($res))
	{
		?>
		
		<div class="panel panel-primary pen">
		  <div class="panel-heading"><?php echo $rs['ques_id']?>
		  <?php echo $rs['question']?>
		  </div>
		  <div class="panel-body pb">
		  <?php
		  
		  $select_query1="SELECT * FROM options WHERE ques_id='".$rs['ques_id']."' ";
		  $res1=mysqli_query($conn,$select_query1);
		  if(mysqli_num_rows($res1)>0)
		  {
			  while($rs1=mysqli_fetch_array($res1))
			  {


				  ?>
				 <br><br>
				  <label for="<?php echo  $rs1['opt_id']; ?>" class="lab">
				  <div class="alert alert-success alt" id="chk">
				  <input type="radio" id="<?php echo $rs1['opt_id']; ?>" name="ans_<?php echo $rs['ques_id']; ?>" 
				  value="<?php echo $rs1['options'];?>" required>

				



				<?php echo $rs1['options']."<br>";?></div></label>
				 
				  
				  
				  <?php
				  
			  }
			  
		  }
		  
		  
		  
		  ?>
		  </div>
		  
		</div>
		

		
		<?php
		
		
	}
	
}

?>
<button type="submit" id="Ssubmit" class="btn btn-primary btn-lg" name="Ssubmit">Submit</button>
<a id="back2Top" title="Back to top" href="#">&#10148;</a>
<br><br>


</form>
</div>

