<?php
session_start();
session_destroy();
header("location: http://localhost/my_project/index1.html");
?>