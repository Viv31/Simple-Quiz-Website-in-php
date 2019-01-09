<?php
include("inc/connection.php");
if(isset($_POST['email']))
{
 $emailId=$_POST['email'];

 $checkdata=" SELECT email FROM register WHERE email like '%$emailId%' ";

 $query=mysqli_query($conn,$checkdata);

 if(mysqli_num_rows($query)>0)
 {
  echo "<p style='color:red;'>Sorry!!Email Already Exist";
 }
 else
 {
  echo "<p style='color:green'>You can use this email</p>";
 }
 exit();
}
?>

