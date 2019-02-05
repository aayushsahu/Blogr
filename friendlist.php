<?php
include("topbar.php");
$email_id=$_SESSION['email_id'];
echo "<body bgcolor=\"#99c2ff\"><div class=\"card1\">";
$i=0;
while(!empty($friends_name_array[$i]))
{
	echo "<div class=\"chip\"><img src=\"upload/$friends_propic_array[$i]\">$friends_name_array[$i]    $friends_email_id_array[$i]</div><br><br>";
	$i++;
}
echo "</div>";
?>