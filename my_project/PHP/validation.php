<?php
session_start();
$username = $_POST['name'];
$mobile = $_POST['id'];
$userpasswd = $_POST['passwd'];
$con = mysqli_connect("127.0.0.1:3307","root","","users");
$q = "SELECT * FROM user WHERE username='$username' && binary password='$userpasswd' && mobile='$mobile'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
mysqli_close($con);
if($num==1)
{
	$_SESSION['name']=$username;
	$_SESSION['id']=$mobile;
	$_SESSION['passwd']=$userpasswd;
 header('location: http://localhost/my_project/welcome.php');
}
else
{
	 echo ("<script>
    	    window.alert('Your mobile number and password are wrong');
    	    window.location.href='http://localhost/my_project/signup.php';</script>");
}
?>