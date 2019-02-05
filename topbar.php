<?php 
include_once("class.html");
$email_id=$_SESSION['email_id'];
$connection=mysqli_connect('localhost','root', '', 'projectblog');
$query="Select * from friendship where friendship_sender='$email_id' OR friendship_receiver='$email_id' AND friendship_status='FRIENDS'";
$result=mysqli_query($connection, $query);
$i=0;
global $friends_name_array;
global $friends_email_id_array;
global $friends_propic_array;
while($row=mysqli_fetch_row($result))
{
$query2="Select * from login where Email_id='$row[1]' OR Email_id='$row[2]' AND Email_id!='$email_id'";
$result2=mysqli_query($connection, $query2);
while($row2=mysqli_fetch_row($result2))
{
	$friends_name_array[$i]=$row2[1]." ".$row2[2];
	$friends_email_id_array[$i]=$row2[5];
	$friends_propic_array[$i]=$row2[7];

}	
$i++;
}
?>
<html>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0px";
}
</script>
<body>
<div id="mySidenav" class="sidenav" onmouseout="closeNav();">
  <a href="userinfo.php"  onmouseover="openNav(); this.style.backgroundColor='#004d00';return true;" onmouseout="openNav(); this.style.backgroundColor='';return true;" ><?php echo "HI ".$_SESSION['flname'];?></a>
  <a href="readblog.php"  onmouseover="openNav(); this.style.backgroundColor='#004d00';return true;" onmouseout="openNav(); this.style.backgroundColor='';return true;" >HOME</a>
  <a href="search.php"  onmouseover="openNav(); this.style.backgroundColor='#004d00';return true;" onmouseout="openNav(); this.style.backgroundColor='';return true;" >SEARCH</a>
  <a href="mailform.php"  onmouseover="openNav(); this.style.backgroundColor='#004d00';return true;" onmouseout="openNav(); this.style.backgroundColor='';return true;" >SEND A MAIL</a>
  <a href="gallery.php"  onmouseover="openNav(); this.style.backgroundColor='#004d00';return true;" onmouseout="openNav(); this.style.backgroundColor='';return true;" >GALLERY</a>
  <a href="postblog.php"  onmouseover="openNav(); this.style.backgroundColor='#004d00';return true;" onmouseout="openNav(); this.style.backgroundColor='';return true;" >POST BLOG</a>
  <a href="session_destroy.php"  onmouseover="openNav(); this.style.backgroundColor='#004d00';return true;" onmouseout="openNav(); this.style.backgroundColor='';return true;" >SIGNOUT</a>  
</div>
<span id="sidenavstick" onmouseover="openNav()"><font color="white"><center>N<br>A<br>V<br>I<br>G<br>A<br>T<br>O<br>R</center></font></span>
</body>
</html>