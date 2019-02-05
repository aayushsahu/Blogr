<?php
include_once("class.html");
include_once("topbar.php");
?>
<HTML>
<BODY background="honeycomb3.jpg">
<center>
<div id="box" class="card">
<Form action=" search.php" method="post">
<input type="textfield" class="textfield" name="searchpeople" placeholder="SEARCH PEOPLE">
<input type="submit" class="button button1" name="search_people" value="SEARCH" onmouseover="this.style.backgroundColor='#004d00';return true;" onmouseout="this.style.backgroundColor=''; return true;">
</form>
<Form action=" " method="post">
<input type="textfield" class="textfield" name="searchposts" placeholder="SEARCH POSTS">
<input type="submit" class="button button1" name="search_posts" value="SEARCH" onmouseover="this.style.backgroundColor='#004d00';return true;" onmouseout="this.style.backgroundColor=''; return true;">
</form>
</div>
</center>
</body>
</html>




<?php

if(isset($_POST['search_people']) && isset($_POST['searchpeople']))
{
	$flag=0;
	$connection=mysqli_connect('localhost','root', '', 'projectblog');
	$searchpeople=$_POST['searchpeople'];
	$email_id=$_SESSION['email_id'];
	$query="Select * from login where Firstname LIKE '%$searchpeople%' OR Lastname LIKE '%$searchpeople%' OR Email_id LIKE '%$searchpeople%'" ;
	$result=mysqli_query($connection, $query);
	$friendship_array=array('REQUEST','REQUESTED','FRIENDS');
	while($row=mysqli_fetch_row($result))
	{
		if($row[5]!=$email_id)
		{
		echo "<center>";
		echo "<table border=\"0\" cell width=500px  background=\"honeycomb2.jpg\">";
		echo "<tr></tr><tr><td width=160px>";	
		echo "<img src=\"upload\\$row[7]\" class=\"circlesmall\">";
		echo "</td><td><font color=\"white\">";	
		echo "NAME: ".$row[1]." ".$row[2]."<br>EMAIL-ID: ".$row[5]."<br>";
		
		$query2="Select * from friendship where friendship_sender='$email_id' AND friendship_receiver='$row[5]' OR friendship_sender='$row[5]' AND friendship_receiver='$email_id'";
		$result2=mysqli_query($connection, $query2);
		$row2=mysqli_fetch_row($result2);
		$friendship_status=$row2[3];
		if(empty($row2))
		echo "<a href=\"send_new_request.php?friendship_sender=$email_id&friendship_receiver=$row[5]\" class=\"button\">SEND REQUEST</a>";
		else if($friendship_status==$friendship_array[0])
		echo "<a href=\"send_request.php?friendship_sender=$email_id&friendship_receiver=$row[5]\" class=\"button\">SEND REQUEST</a>";
		else if($email_id==$row2[1] || $friendship_status=='FRIENDS')
		echo "FRIENDSHIP STATUS: ".$friendship_status;
		else if($email_id==$row2[2])
		{
		echo "<a href=\"friendship_a_r.php?friendship_sender=$row[5]&friendship_receiver=$email_id&friendship_status='FRIENDS'\" class=\"button\">ACCEPT</a>";	
		echo "<a href=\"friendship_a_r.php?friendship_sender=$row[5]&friendship_receiver=$email_id&friendship_status='REQUEST'\" class=\"button\">REJECT</a>";
		}
		echo "</font></td></tr><tr></tr>";
		echo "</center>";		
		$flag=1;
		echo "</table>";
		echo "<br><br><br>";
		}
	}
	if($flag==0)
	echo "<script>alert(\"NO RESULT FOUND\")</script>";	
}
?>