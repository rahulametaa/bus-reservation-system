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

</head>
<body>
	<header id="head1">
		<h1>online bus booking</h1>
	</header>
<div id="d">
<div id="d1">
	<img src="fav.png" alt="MDN logo" id="logo">
	<ul>
    <li><a href="login.php">login</a></li>
      <li><a href="index1.html">home</a></li>	
	</ul>
</div>

<div id="formdiv">
	<div id='d3'>
	<h3 style="position:relative;text-align:center;top:10px;font-size:30px;color:white;">Register</h3>
	</div>
<form action="signinInsert.php" method="post">
 
  <input id="usrname" class="input" type="text" name="name" placeholder="Name" required><br>
  <input id="usrid"  class="input" type="number" name="id" placeholder="Mobile number"  required><br>
   <input id="usrpasswd"  class="input" type="password" name="passwd" placeholder="Password"  required><br>
  <input id="usrre"  class="input" type="password" name="repasswd" placeholder="Reenter"  required><br>
<input type="submit" class="input" value="register"/>
<input type="reset"  class="input"/>
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