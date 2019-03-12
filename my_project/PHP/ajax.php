<?php
session_start();
$seat=$_GET['x'];
$busid=$_GET['y'];
$date=$_SESSION['date'];
$userid=$_SESSION['id'];
$con = mysqli_connect("127.0.0.1:3307","root","","users");
$q1="SELECT fare FROM buses WHERE busid='$busid'";
$result1=mysqli_query($con,$q1);
$row=mysqli_fetch_assoc($result1);
$q2="INSERT INTO seat (busid,seat_booked,_date) values ('$busid','$seat','$date')";
$result2=mysqli_query($con,$q2);
$name=$_SESSION['name'];
$_from=$_SESSION['_from'];
$_to=$_SESSION['_to'];
$fare=$row['fare'];
$q3 = "INSERT INTO booked (username,userid,busid,_from,_to,seat,date_of,fare) values ('$name','$userid','$busid','$_from','$_to','$seat','$date','$fare')";
$result3=mysqli_query($con,$q3);
mysqli_close($con);

?>