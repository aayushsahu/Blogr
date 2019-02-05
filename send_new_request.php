<?php	
$friendship_sender=$_GET['friendship_sender'];
$friendship_receiver=$_GET['friendship_receiver'];
date_default_timezone_set("Asia/Kolkata");
$date=date("y-m-d");
$time=date("H:i:s");
$connection=mysqli_connect('localhost','root', '', 'projectblog');
$query="Insert into friendship (friendship_sender, friendship_receiver, friendship_status, date, time) values('$friendship_sender', '$friendship_receiver', 'REQUESTED', $date, '$time')";	
mysqli_query($connection,$query);
header("location:friendlist.php");
?>