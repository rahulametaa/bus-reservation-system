<?php 
session_start();
if(is_null($_SESSION['id']))
 header('location: http://localhost/my_project/login.php');
$busid=$_GET['busid'];
$date=$_SESSION['date'];
$_SESSION['busid']=$busid;

$con = mysqli_connect("127.0.0.1:3307","root","","users");
$q="SELECT seat_booked FROM seat WHERE busid='$busid' AND _date='$date'";
$result=mysqli_query($con,$q);
mysqli_close($con);
$i=0;
$x=array();
while($row=mysqli_fetch_assoc($result))
{
	$x[$i++]=$row['seat_booked'];
}

function isbooked($seat,$allseat)
{
foreach ($allseat as $y)
{
	if($y==$seat)
		 return 1;
}
	return 0;
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
		top:250px;
		left:300px;
		width:800px;
		height:370px;
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
	.button
	{
	width:100px;
	height:75px;
	background-image:url('rsz_bussit.png');
	}

</style>

<script>
function fun(y)
{

var x=document.getElementById(y);
busid=<?php echo $busid; ?>;
if(x.style.backgroundColor=="blue"||x.style.backgroundColor=="orange")
{
	alert("already book");
}
else
{
x.style.backgroundColor="orange";
var req=new XMLHttpRequest();
req.open("GET","http://localhost/my_project/ajax.php?x="+x.value+"&y="+busid,false);
req.send();
}

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
<h2 style="position:fixed;top:160px;z-index:120;">Hello <?php echo $_SESSION['name'];?>,Book your seat.</h2>
<div id="formdiv">
	<?php
	$arr=array('','s1','s2','s3','s4','s5','s6','s7','s8','s9','s10','s11','s12','s13','s14','s15','s16','s17','s18','s19','s20','s21','s22','s23','s24','s25','s26','s27','s28','s29','s30','s31','s32');
	$t=0;
	for($j=0;$j<5;$j++)
	{
		$t++;
		if($j!=2)
	    {
	    		$i=$t;
        for($k=0;$k<8;$k++)
         {

     	  
     	   if(isbooked($i,$x))
     	   {
                echo "<button onclick=fun(this.id) class='button' style='background-color:blue;' value={$i} id={$arr[$i]}>";
            }
            else
            {
            	 echo "<button onclick=fun(this.id) class='button' value={$i} id={$arr[$i]}>";

            }
            
     	   echo $i;
     	   $i=$i+2;
             echo "</button>";
         } 
        }
        else
        {
        	$t=16;
         echo "<br><br><br><br><br>";
        }

    }
   ?>
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