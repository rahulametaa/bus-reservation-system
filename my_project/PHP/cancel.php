<?php
session_start();
$cancel_busid=$_GET['cancel_busid'];
$cancel_seat=$_GET['cancel_seat'];
$cancel_date=$_GET['cancel_date'];
$userid=$_SESSION['id'];
$con = mysqli_connect("127.0.0.1:3307","root","","users");
$q1="DELETE FROM booked WHERE userid='$userid' AND busid='$cancel_busid' AND seat='$cancel_seat' AND date_of='$cancel_date'";
$result = mysqli_query($con,$q1);
$q2 = "DELETE FROM seat WHERE busid='$cancel_busid' AND seat_booked='$cancel_seat' AND _date='$cancel_date'";
$result=mysqli_query($con,$q2);
mysqli_close($con);
header('location: http://localhost/my_project/viewbooking.php');
?>