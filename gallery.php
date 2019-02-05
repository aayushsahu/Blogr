<?php
include("class.html");
include("topbar.php");
$connection=mysqli_connect('localhost','root', '', 'projectblog');
$query="Select * from blogs where Email_id='".$_SESSION["email_id"]."'";
$result=mysqli_query($connection, $query);
echo "<body style=\"background-attachment:fixed;\">";
//echo "<div class=\"card2\">";
$px=30;
$j=0;
while($row=mysqli_fetch_row($result))
{
$query2="Select * from attachments where blog_id=$row[0]";
$result2=mysqli_query($connection, $query2);
while($row2=mysqli_fetch_row($result2))
{	
	$j++;	
	echo "<a href=\"imagedisplay.php?image_name=$row2[2]&blog_id=$row2[1]&date=$row[4]&time=$row[5]&day=$row[6]\"><img  name=\"sharedpic[]\" multiple=\"\" src=\"upload/sharedpics/".$row2[2]."\" height=\"200px\" width=\"317px\" class=\"smallframe card2\" style=\" position:absolute; left:$px;\"></a>";
	$px=$px+400;
	if($j%3==0)
	{
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
	$px=30;
	}
	//echo "<br>[$row[4]][$row[6]]";
}
}
?>


transform:translate('-50%','50%'); 
this.classList.remove('center');
this.classList.add('center'); 