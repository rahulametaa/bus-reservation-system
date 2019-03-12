<?php
session_start();
if(is_null($_SESSION['id']))
 header('location: http://localhost/my_project/login.php');
$userid=$_SESSION['id'];
$con = mysqli_connect("127.0.0.1:3307","root","","users");
$q="SELECT * FROM booked WHERE userid='$userid'";
$result = mysqli_query($con,$q);
$num=mysqli_num_rows($result);
$i=0;
while($row=mysqli_fetch_assoc($result))
{
	$arr[$i]['busid']=$row['busid'];
	$arr[$i]['_from']=$row['_from'];
	$arr[$i]['_to']=$row['_to'];
	$arr[$i]['seat']=$row['seat'];
	$arr[$i]['date_of']=$row['date_of'];
	$arr[$i]['fare']=$row['fare'];
	$i++;
}
date_default_timezone_set("Asia/Kolkata");
$current_date=date("Y-m-d");
$current_time=date("H:i:s");

?>

<html>
<head>
	<title>online bus booking system</title>
	<link rel="stylesheet" type="text/css" href="stsheet.css"/>
	<style type="text/css">
    
	#t1
	{
		position:relative;
		top:200px;
		width:100%;
	}
	td,th
	{
      padding-left:50px;
      font-size:25px; 
	}
	.button
	{
	width:75px;
	height:25px;
	}
    </style>

 <script>
 function fun(x,y,z)
 {
 	var f=document.getElementById(z);
window.location.href="http://localhost/my_project/cancel.php?cancel_busid="+x+"&cancel_seat="+y+"&cancel_date="+f.value;


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
    <li><a href="welcome.php">search bus</a></li>
	</ul>
</div>
<table id="t1" border="3px">
<?php
 if($num==0)
  {
     
  		echo "<th><h2 style='position:relative;width:100%;'>No booking</h2></th>";
  }
  else
  {
  		echo "<tr>
    <th>Busid</th>
    <th>From</th>
     <th>To</th>
     <th>dep time</th>
     <th>arr time</th>
    <th>Date</th>
    <th>Seat No.</th>
    <th>Fare</th>
    <th>Cancel ticket</th>
  </tr>";

   for($j=0;$j<$num;$j++)
   {
   	$busid=$arr[$j]['busid'];
   	$q="SELECT deptime , arrtime FROM buses WHERE busid='$busid'";
   	$result=mysqli_query($con,$q);
   	while($row=mysqli_fetch_assoc($result))
   	{
   		$deptime=$row['deptime'];
   		$arrtime=$row['arrtime'];
   	}

  	echo "<tr>";
  		echo "<td>"; 
  		echo $arr[$j]['busid'];
  		echo "</td>";
  		echo "<td>"; 
  		echo $arr[$j]['_from'];
  		echo "</td>";
  		echo "<td>"; 
  		echo $arr[$j]['_to'];
  		echo "</td>";
  		echo "<td>"; 
  		echo $deptime;
  		echo "</td>";
  		echo "<td>"; 
  		echo $arrtime;
  		echo "</td>";
  		echo "<td>"; 
  		echo $arr[$j]['date_of'];
  		echo "</td>";
  		echo "<td>"; 
  		echo $arr[$j]['seat'];
  		echo "</td>";
  		echo "<td>"; 
  		echo $arr[$j]['fare'];
  		echo "</td>";
  		if(($arr[$j]['date_of']>$current_date)||(($arr[$j]['date_of']==$current_date)&&($current_time<$deptime)))
  		{
  			$_SESSION['cancel_busid']=$arr[$j]['busid'];
  			$_SESSION['cancel_seat']=$arr[$j]['seat'];
  			$_SESSION['cancel_date']=$arr[$j]['date_of'];
  		echo "<td>"; 
  		 echo "<button onclick=fun({$arr[$j]['busid']},{$arr[$j]['seat']},this.id) value={$arr[$j]['date_of']} class='button' id={$j}>";
  		echo "</td>";
  		}
  	echo "</tr>";
  }
  }

  ?>
</table>
</div>
<div id="d2">
	<footer id="foot">
  Some copyright info or perhaps some author
  info for an &copy;
</footer>
</div>
</body>
</html>