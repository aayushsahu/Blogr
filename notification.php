<?php
include("topbar.php");
$email_id=$_SESSION['email_id'];
$connection=mysqli_connect('localhost','root', '', 'projectblog');
$query="Select * from friendship where friendship_receiver='$email_id' AND friendship_status='REQUESTED'";
$result=mysqli_query($connection, $query);
while($row=mysqli_fetch_array($result))
{
echo "<div class=\"alert\"><span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\" onmouseover=\"this.style.color='white'\">&times;</span>";
echo $row['friendship_sender'];
echo "<a href=\"friendship_a_r.php?friendship_sender=".$row['friendship_sender']."&friendship_receiver=$email_id&friendship_status='FRIENDS'\" class=\"button\">ACCEPT</a>";	
echo "<a href=\"friendship_a_r.php?friendship_sender=".$row['friendship_sender']."&friendship_receiver=$email_id&friendship_status='REQUEST'\" class=\"button\">REJECT</a>";
echo "</div>";		
}
?>
