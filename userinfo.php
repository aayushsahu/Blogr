<?php
include("class.html");
include("topbar.php");
$connection=mysqli_connect('localhost','root', '', 'projectblog');
$email_id=$_SESSION['email_id'];
$query="Select * from login where Email_id='$email_id'";
$result= mysqli_query($connection, $query);
$row=mysqli_fetch_row($result);
echo "<BODY background=\"honeycomb3.jpg\">";			
echo "<center>";
echo "<table border=\"0\" cell width=500px  background=\"honeycomb2.jpg\">";
echo "<tr></tr><tr><td width=160px>";	
echo "<img src=\"upload\\$row[7]\" class=\"circle\">";
echo "</td><td><font color=\"white\">";	
echo "NAME: ".$row[1]." ".$row[2]."<br>DOB: ".$row[3]."<br>GENDER: ".$row[4]."<br>EMAIL-ID: ".$row[5]."<br>";
echo "</font></td></tr><tr></tr>";
echo "</table>";
echo "</center>";		
echo "</body>";					
?>





<?php
include_once("class.html");
include_once("topbar.php");
$connection=mysqli_connect('localhost','root', '', 'projectblog');
$query="Select * from blogs where Email_id='".$_SESSION['email_id']."' ORDER BY blog_id DESC";
$result=mysqli_query($connection, $query);
echo "<div id=\"content\">";
echo "<body  background=\"honeycomb3.jpg\" style=\"background-attachment:fixed;\">";
echo "<table border=\"0\" cell width=1060px  background=\"honeycomb2.jpg\">";
echo "<center>";
while($row=mysqli_fetch_row($result))
{
$query2="Select * from login where Email_id='".$row[1]."'";
$result2=mysqli_query($connection, $query2);
$row2=mysqli_fetch_row($result2);

echo "<tr><td width=160px>";
echo "<img src=\"upload/".$row2[7]."\" class=\"circle\"><br><center><font color=\"white\"> $row2[1] $row2[2]</font></center>";
echo "</center>";
echo "</td><td>";
echo "<div class=\"card1\"><center>";
$query4="select attachment from attachments where blog_id=$row[0]";
$result4=mysqli_query($connection, $query4);
$j=0;
while($row4=mysqli_fetch_row($result4))
{
	$j++;
	if($j==3)
	break;
	echo "<img src=\"upload/sharedpics/".$row4[0]."\" height=\"200px\" width=\"200px\" class=\"smallframe card\">";		
}
echo "<font color=\"white\"> <br>$row[2]<br><br><br></font></center><font color=\"grey\">[$row[4]][$row[5]][$row[6]]</font>";
echo "<br><a href=\"writecomment.php?post_id=$row[0]\">Write A Comment</a>";

$query3="Select * from comments where post_id='".$row[0]."'";
$result3=mysqli_query($connection, $query3);
while($row3=mysqli_fetch_row($result3))
{
echo "<font color=\"white\"> <br><br><br>$row3[1][$row3[2]]<br></font><font color=\"grey\">$row3[3]<br><a href=\"comment_like.php?comment_id=$row3[7]&comment_likes=$row3[4]&post_id=$row[0]\">[$row3[4]]</a>[$row3[5]][$row3[6]]</font>";
}
echo "</div><br>";
}
echo "</td></div>";
echo "<tr><td><br><br><br><br></td><td></td><\tr>";
echo "</table>";
echo "</body>";
?>