<?php
include("inc/header.php");
if(!isset($_SESSION['email']))
{
	
	header("location:index.php");
}
?>
<style>
	
body
{
	background-color: #ECF0F1;
}

</style>
<br>
<br><br>
<br>
<!--
the following script is used for preventing go back on tab once test is start
-->
	<script>
	history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
	
	</script>
<div class="container">
<h3>Your Result is:</h3>
<div id="result">
<table border="1" class="table table-hover">
<tr>
<th>Total Questions</th>
<th style="color:red">Wrong Answers</th>
<th style="color:green">Right Answers</th>

</tr>
<tr>
<td><?php echo $_SESSION['wrong']+ $_SESSION['score'];?></td>
<td style="color:red">
	<?php if(isset($_SESSION['wrong'])){echo $_SESSION['wrong']; }?>
	
</td>

<td style="color:green">
	<?php if(isset($_SESSION['score'])){echo $_SESSION['score'];}?>
		
	</td>
</tr>
</div>
</table>
</div>





<?php



//echo "<h1>your wrong answers are ".$_SESSION['wrong']."</h1>";
//echo "<h1>your right answers are  ".$_SESSION['score']."</h1>";
//echo"<a href='Admin/Right_ans/Answers.php' target='_blank'><button type='button' class='btn btn-primary'>Check Answers</button></a><br>";
?>
<?php if($_SESSION['score']<=6){
	             echo"<h1><center>". $_SESSION['name']."</center></h1>";
	echo "<center><h1 style='color:red;text-shadow: 2px 2px black;'>You should work hard!!!!</h1></center>";
	echo"<hr>";
	
}
else{
	echo"<h1><center>".$_SESSION['name']."</center></h1>";
	echo"<center><h1 style='color:green;text-shadow: 2px 2px black;'>Congratulations!!!!You have Passed Successfully!!!</h1></center>";
	echo"<hr>";
}

?>
<?php include("inc/footer.php");?>

<div align="center">
	<a href="answer.php"><button class="btn btn-primary btn-lg" name="resultans">See Answers</button></a>
</div>

