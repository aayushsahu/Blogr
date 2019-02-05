<?php	
$friendship_sender=$_GET['friendship_sender'];
$friendship_receiver=$_GET['friendship_receiver'];
date_default_timezone_set("Asia/Kolkata");
$date=date("y-m-d");
$time=date("H:i:s");
$connection=mysqli_connect('localhost','root', '', 'projectblog');
$query="Update friendship set friendship_sender='$friendship_sender', friendship_receiver='$friendship_receiver', friendship_status='REQUESTED' where friendship_sender='$friendship_sender' AND friendship_receiver='$friendship_receiver' OR friendship_sender='$friendship_receiver' AND friendship_receiver='$friendship_sender'";	
mysqli_query($connection,$query);
?>