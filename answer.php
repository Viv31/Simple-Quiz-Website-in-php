<?php
include("inc/connection.php");
include("inc/header.php");


/*
HTTP_REFERER this method is check what path is given 
an HTTP header field that identifies the address of the webpage (i.e. the URI or IRI) that linked to the resource being requested. By checking the referrer, the new webpage can see where the request originated.

*/
if (!isset($_SERVER['HTTP_REFERER'])){

	
 // echo "<script>alert('hii')</script>";
	header("location:home.php");
}




?>
<br><br><br><br>
<div class="container">
  <h2>Right Answers</h2>
             
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sno<?php $sno=0;?></th>
        <th>Question</th>
        <th>Answer</th>
      </tr>
	  </thead>
    <tbody>
	  <?php
	  $select_query="SELECT * FROM questions";
	  $res=mysqli_query($conn,$select_query);
	  if(mysqli_num_rows($res)>0){
		  
		  while($rs=mysqli_fetch_assoc($res)){
			  ?>
			  
      <tr>
        <td><?php echo ++$sno;?></td>
        <td><?php echo $rs['question'];?></td>
		
        <td><?php 
		$select_query2="SELECT * FROM options Where ques_id='".$rs['ques_id']."'";
		$res2=mysqli_query($conn,$select_query2);
		if(mysqli_num_rows($res2)>0){
			
			while($rs2=mysqli_fetch_assoc($res2)){
				if($rs2['ques_id'] && $rs2['right_answer']==1){
					echo $rs2['options'];
					
				}
			}
		}
		
		
		
		?></td>
      </tr>

      
    
			  
			  
			<?php  
		  }
		  
	  }
	  else
	  {
	  	?>
	  	<tr>
	  		<td colspan="3"><b>No Answers Found</b></td>
	  	</tr>
	  	<?php
	  }
	  
	  ?>
    </tbody>
  </table>
 
</div>
<br><br><br><br><br><br>
<?php include("inc/footer.php");?>