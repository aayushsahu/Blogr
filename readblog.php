<?php
include_once("class.html");
include_once("topbar.php");
echo "<script src=\"slideshow.js\"></script>";
$connection=mysqli_connect('localhost','root', '', 'projectblog');
$query="Select * from blogs ORDER BY blog_id DESC";
$result=mysqli_query($connection, $query);
echo "<body bgcolor=\"red\">";
echo "<div id=\"content\">";
echo "<table bgcolor=\"yellow\">";
while($row=mysqli_fetch_row($result))
{
$query2="Select * from login where Email_id='".$row[1]."'";
$result2=mysqli_query($connection, $query2);
$row2=mysqli_fetch_row($result2);
echo "<tr><td width=160px><center>";
echo "<img src=\"upload/".$row2[7]."\" class=\"circle\"><br><center><font color=\"white\">$row2[1] $row2[2]</font></center>";
echo "</center>";
echo "</td><td>";
$lines=0;
$lines=count(preg_split('/\r/',$row[2]));
$max_height=($lines*26)+405.5;
echo "<div class=\"card1\" style=\"max-height:".$max_height."px;\"><center>";
$attachment_flag=0;
$query4="select attachment from attachments where blog_id=$row[0]";
$result4=mysqli_query($connection, $query4);
echo "<div class=\"slideshow-container\"><div style=\"text-align:center\">";
while($row4=mysqli_fetch_row($result4))
{	
	$attachment_flag=1;
	echo "<span class=\"dot dots".$row[0]."\" onmouseover=\"this.style.backgroundColor= 'white';\" onmouseout=\"this.style.backgroundColor= 'grey';\"></span>";
	echo "<div class=\"mySlides".$row[0]." fade\" style=\"position:absolute; left:260px;\"><a class=\"prev\" onclick=\"plusSlides(-1,".$row[0].")\">&#10094;</a><img src=\"upload/sharedpics/".$row4[0]."\" height=\"200px\" width=\"200px\" class=\"smallframe card\"><a class=\"next\" onclick=\"plusSlides(1,".$row[0].")\">&#10095;</a></div>";
}
echo "</div></div></center>";
if($attachment_flag==1)
echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
echo "<br><span class=\"text\" style=\"width:820px; word-wrap:break-word; text-align:left;\"><font color=\"white\">".nl2br($row[2])."</font><br><font color=\"black\">[$row[4]][$row[5]][$row[6]]</font></span>";
echo "<br><a href=\"writecomment.php?blog_id=$row[0]\" class=\"button\">Write A Comment</a>";
$query3="Select * from comments where blog_id=$row[0]";
$result3=mysqli_query($connection, $query3);
echo "<div class=\"slideshow-container\">";
$comment_flag=0;
$comment_index=0;
while($row3=mysqli_fetch_row($result3))
{
	$comment_flag=1;	
	echo "<span class=\"dot dotss".$row[0]."\" style=\"text-align: center;\" onmouseover=\"this.style.backgroundColor= 'white';\" onmouseout=\"this.style.backgroundColor= 'grey';\"></span>";
	echo "<div class=\"alert comment".$row[0]." fade\" style=\"position:absolute; opacity:1; width:870px; right:-25px; \"><a class=\"prev\" style=\"left:0px;\" onclick=\"plusComments(-1,".$row[0].")\">&#10094;</a><font color=\"black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class=\"chip\" style=\"position:relative; top:-20px;\"><img src=\"upload/$row2[7]\">$row3[2]</div><font color=\"white\">&nbsp;&nbsp;&nbsp;&nbsp;".nl2br($row3[4])."</font><a href=\"comment_like.php?comment_id=$row3[0]&comment_likes=$row3[5]&blog_id=$row[0]\">[$row3[5]]</a>[$row3[6]][$row3[7]]</font><a class=\"next\" onclick=\"plusComments(1,".$row[0].");\">&#10095;</a></div>";
}
echo "</div>";
echo "</div>";
if($comment_flag==1)
echo "<br><br><br>";
}
echo "</td>";
echo "<tr><td><br><br><br><br></td><td></td></tr>";
echo "</div></table>";
echo "</body>";
?>