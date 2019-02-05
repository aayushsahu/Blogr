<?php
$friendship_sender=$_GET['friendship_sender'];
$friendship_receiver=$_GET['friendship_receiver'];
$friendship_status=$_GET['friendship_status'];
date_default_timezone_set("Asia/Kolkata");
$date=date("y-m-d");
$time=date("H:i:s");
$connection=mysqli_connect('localhost','root', '', 'projectblog');
$query="Update friendship set friendship_status=$friendship_status, date='$date', time='$time' where friendship_sender='$friendship_sender' AND friendship_receiver='$friendship_receiver'";	
mysqli_query($connection,$query);
header("location:search.php");
?>
ALTER TABLE blogs Add FOREIGN KEY (Email_id) REFERENCES login(Email_id);  