<?php
$con = mysqli_connect("127.0.0.1:3307","root","","users");
$username = $_POST['name'];
$mobile = $_POST['id'];
$userpasswd = $_POST['passwd'];
	$q2 = "INSERT INTO user (username,mobile,password) VALUES ('$username','$mobile','$userpasswd')";
	$result=mysqli_query($con,$q2);
	mysqli_close($con);
	if($result)
	{
	header('location: http://localhost/my_project/login.php');
    }
   else
  {
    echo ("<script>
    	    window.alert('You have already registered!');
    	    window.location.href='http://localhost/my_project/login.php';</script>");
  }
  ?>
 