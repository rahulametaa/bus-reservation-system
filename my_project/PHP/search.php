<?php
session_start();
if(is_null($_SESSION['id']))
 header('location: http://localhost/my_project/login.php');
$_from=$_POST['_from'];
$_to=$_POST['_to'];
$_SESSION['date']=$_POST['date'];
date_default_timezone_set("Asia/Kolkata");
$current_date=date("Y-m-d");
$current_time=date("H:i:s");
if($_POST['date']<$current_date)
{
	echo ("<script>
    	    window.alert('Date has been spend!');
    	    window.location.href='http://localhost/my_project/welcome.php';</script>");
}
$con = mysqli_connect("127.0.0.1:3307","root","","users");
if($current_date==$_SESSION['date'])
{
$q = "SELECT * FROM buses WHERE _from='$_from' && _to='$_to' && deptime>'$current_time'";
}
else
{
	$q="SELECT * FROM buses WHERE _from='$_from' && _to='$_to'";
}
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
mysqli_close($con);
$_SESSION['_from']=$_from;
$_SESSION['_to']=$_to;
$j=0;
while($row=mysqli_fetch_assoc($result))
{
	$array[$j++]=$row;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>online bus booking system</title>
	<link rel="stylesheet" type="text/css" href="stsheet.css"/>
		<style type="text/css">
	form
	{
		position:relative;
		text-align:center;
		padding-top: 30px;
    padding-right: 30px;
    padding-bottom: 50px;
    padding-left: 30px;
	}
#formdiv
	{
		border-style:groove;
		position:absolute;
		top:200px;
		left:300px;
		width:800px;
		height:400px;
		background-color: #FEFCFF;

	}
	.input
	{
	height:30px;
	width:200px;
	margin-top:10px;

	}
	#d3
	{
		background-color:green;
		position:relative;
		height:50px;
	}
	#t1
	{
		position:relative;
		top:30px;
		left:15px;
	}
	td,th
	{
      padding-left:30px;
      font-size:20px; 
	}
	#i
	{
		width:40px;
		height:50px;
	}
	.input
	{
	  margin-top:100px;
	  height:30px;
	}
	.b
	{
		height:50px;
		width:50px;
	}
</style>
 <script>
 function fun(x)
 {
window.location.href="http://localhost/my_project/book.php?busid="+x;
}
  </script>
</head>
<body>
	<header id="head1">
		<h1>online bus booking</h1>
	</header>
	<div id="d">
<div id="d1">
	<img src="fav.png" alt="MDN logo" id="logo">
	<ul>
	   <li><a href="logout.php">logout</a></li>
     <li><a href="viewbooking.php">view booking</a></li>
       <li><a href="welcome.php">search buses</a></li>
	</ul>
</div>
<h2 style="position:fixed;top:160px;">Hello <?php echo $_SESSION['name'].",";?></h2>
<div id="formdiv">
	<div id='d3'>
	<h3 style="position:relative;text-align:center;top:10px;font-size:30px;color:white;">your buses</h3>
	</div>
<table id="t1" border="2px">
  
  <?php 
  if($num==0)
  {
 
  		echo "<h2 style='position:relative; left:300px;'>no bus is available</h2>";
  	
  }
  else
  {
  	echo "<tr>
    <th>From</th>
    <th>To</th>
     <th>Bus Id</th>
    <th>Departure Time</th>
    <th>Arrival Time</th>
    <th>Fare</th>
  </tr>";
  for($j=0;$j<$num;$j++)
   {
  	echo "<tr>";
  		echo "<td>"; 
  		echo $array[$j]['_from'];
  		echo "</td>";
  		echo "<td>"; 
  		echo $array[$j]['_to'];
  		echo "</td>";
  		echo "<td>"; 
  		echo $array[$j]['busid'];
  		echo "</td>";
  		echo "<td>"; 
  		echo $array[$j]['deptime'];
  		echo "</td>";
  		echo "<td>"; 
  		echo $array[$j]['arrtime'];
  		echo "</td>";
  		echo "<td>"; 
  		echo $array[$j]['fare'];
  		echo "</td>";
  		echo "<td>"; 
  		echo "<button class='b' onclick=fun({$array[$j]['busid']})>Book</button>";
  		echo "</td>";
  	echo "</tr>";
  }
}
  ?>
</table>
</div>
</div>
<div id="d2">
	<footer id="foot">
  Some copyright info or perhaps some author
  info for an &copy;
</footer>
</div>
</body>
</html>