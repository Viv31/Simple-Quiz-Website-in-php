<?php
session_start();
//echo"<h1>this is a result page</h1>";
include("inc/connection.php");
?>
<?php

//print_r($_POST);

$wrong=0;
$score=0;
$total=$wrong+$score;
	
	$_SESSION['wrong']=$wrong;
	$_SESSION['score']=$score;


	
	$sql = "SELECT * ";
	$sql.=" FROM questions";
	$query=mysqli_query($conn, $sql);
	while($rs2=mysqli_fetch_assoc($query))


	//for($i=1;$i<=4;$i++)
	{
		$i=$rs2['ques_id'];
	$ans="ans_".$i;
	$q1=substr($ans,4);
	$qy="Select * from options WHERE ques_id='".$q1."' and options='".$_POST[$ans]."' and right_answer=1";
	$res=mysqli_query($conn,$qy);


	if($rs=mysqli_fetch_assoc($res))
	{
		
		//echo "true";
		
		
		$score++;
	}
	else
	{
		
		//echo "false";
		$wrong++;
	}
	
	
}




	$_SESSION['wrong']=$wrong;
	$_SESSION['score']=$score;
	//echo "your wrong answers  ".$wrong."<br>";
	//echo "your right answers  ".$score;
	
	
	/*
	this query is use for storeing quiz result into databse or result table 
	it is taking user id via session and users right ans and its wrong ans and storing it
	
	
	*/
	$user_name=$_SESSION['name'];
	$lname=$_SESSION['lname'];
	$uemail=$_SESSION['email'];
	
	$user_id=$_SESSION['id'];
	$right_ans=$_SESSION['score'];
	$wrong_ans=$_SESSION['wrong'];
	

 $insert_query="INSERT INTO result(user_id,user_name,lname,uemail,right_ans,wrong_ans,test_date,test_time)VALUES('$user_id','$user_name','$lname','$uemail','$right_ans','$wrong_ans',CURDATE(),CURTIME())";
$res=mysqli_query($conn,$insert_query);

if($res!=true){
	die("not stored");
}

else{
	//echo"stored";
	header("location:result.php");
}
	
	
	
	


?>


