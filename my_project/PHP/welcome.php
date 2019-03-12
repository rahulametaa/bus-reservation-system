<?php
#load new data in database
session_start();
if(is_null($_SESSION['id']))
 header('location: http://localhost/my_project/login.php');
date_default_timezone_set("Asia/Kolkata");
$current_date=$current_date=date("Y-m-d");
$con = mysqli_connect("127.0.0.1:3307","root","","users");
$q = "DELETE FROM seat WHERE _date<'$current_date'";
$result = mysqli_query($con,$q);
mysqli_close($con);
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
		left:550px;
		width:300px;
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
</style>

<script type="text/javascript">
	
	function fun1(i1,i2)
	{
		var s1=document.getElementById(i1);
		var s2=document.getElementById(i2);
		s2.innerHTML="";
        var arr=["Jaipur","Delhi","Bhopal"];
		for(var i=0;i<3;i++)
		{
		 if(arr[i]!=s1.value)
		 {
		 	var option=document.createElement("option");
		 	option.text=arr[i];
		 	s2.add(option);

		 }
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
	</ul>
</div>
<h2 style="position:fixed;top:160px;">Hello <?php echo $_SESSION['name'];?>,</h2>
<div id="formdiv">
	<div id='d3'>
	<h3 style="position:relative;text-align:center;top:10px;font-size:30px;color:white;">Book your Bus</h3>
	</div>
<form action="search.php" method="post">
	<label>From</label>
 <select class="input" id="s1" onclick=fun1(this.id,"s2") name="_from" placeholder="From" required>
 	<option disabled="disabled" selected>select</option>
 	<option>Jaipur</option>
 	<option>Delhi</option>
 	<option>Bhopal</option>
 </select>
  <lable>  To</lable>
  <select class="input" style="margin-left:15px;" id="s2" name="_to" required>
 </select>
 <input type="date" id="dateofbooking"  class="input" name="date" style="margin-left:30px" required/>
<input type="submit" class="input" value="Search" style="margin-left:30px;"/>
<input type="reset"  class="input" style="margin-left:30px;"/>
</form>
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