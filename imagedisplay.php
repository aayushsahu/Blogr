<?php
include("class.html");
include("topbar.php");
$image_name=$_GET['image_name'];
$blog_id=$_GET['blog_id'];
$date=$_GET['date'];
$day=$_GET['day'];
$time=$_GET['time'];

echo "<div class=\"card1\">";
echo "<center><img src=\"upload/sharedpics/$image_name\" style=\"max-height:500px; max-width:800px;\"></center>";
echo "<font color=\"black\">[$date][$day][$time]</font>";

echo "<br><a href=\"writecomment.php?blog_id=$row[0]\">Write A Comment</a>";

$query="Select * from comments where blog_id=$blog_id ORDER BY comment_id DESC";
$result=mysqli_query($connection, $query);
while($row=mysqli_fetch_row($result))
{
$query2="Select * from login where Email_id='$row[3]'";
$result2=mysqli_query($connection, $query2);
$row2=mysqli_fetch_row($result2);
echo "<div class=\"alert\"><font color=\"black\"><div class=\"chip\"><img src=\"upload/$row2[7]\">$row[2]</div><font color=\"white\">&nbsp;&nbsp;&nbsp;&nbsp;$row[4]<br></font><a href=\"comment_like.php?comment_id=$row[0]&comment_likes=$row[5]&blog_id=$blog_id\">[$row[5]]</a> [$row[6]][$row[7]]</font></div>";
}

echo "</div>";


?>