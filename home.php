<?php
include("inc/header.php");

include("inc/connection.php");
echo "<br><br><br><br><center><h3>Welcome: ".$_SESSION['name']."  ".$_SESSION['lname']."</h3></center>";
echo"<center><h3>Welcome To QuizWorld</h3></center>";

if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
if(isset($_POST['logout'])){
	
	header("location:index.php");
}
?>
<style>
body{
  background-image: url('6.jpg');
  background-size: 100%;
  color: white;
}
.pan{
  color: black;
}
.btc{

  background-color: transparent;
  border-color: white;


</style>


<div class="container">
<br>
<div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Click me for Quiz rules:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        
        <div class="panel-footer pan"><h4>1)&nbsp;Each question have four options choose the correct one.</h4></div>
		<div class="panel-body pan"><h4>2)&nbsp;Once you start quiz category you can not go back untill you submit.</div>
        <div class="panel-footer pan"><h4>3)&nbsp;Do not refresh your page otherwise you will lose your data</h4></div>
		<div class="panel-body pan"><h4>4)&nbsp;Each question contains one marks</h4></div>
        <div class="panel-footer pan">ALL THE BEST!!!START YOUR QUIZ......</div>
		
      </div>
    </div>
  </div>



    
	

<center><a href="quiz.php"><button class="btn btn-primary btn-lg btc">Start Quiz</button></a></center>
		 


</div>
<?php
include("inc/footer.php");
?>