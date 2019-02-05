<?php
if(isset($_POST['submitlogin']))
{
	session_start(); 
	$connection=mysqli_connect('localhost','root', '', 'projectblog');
	$query="select * from login";
	$result= mysqli_query($connection, $query);
	$email_id=$_POST['email_id'];
	$password=$_POST['pass'];
	
	$hash="$2y$11$";
	$salt="NOONECANHAVEFAMENMONEY";
	$hash_n_salt=$hash . $salt;
	$password=crypt($password, $hash_n_salt);
	
	
	$flag=0;
	while($row=mysqli_fetch_row($result))
	{
	if($row[5]==$email_id && $row[6]==$password)
	{
	$_SESSION['email_id']=$email_id;
	$_SESSION['flname']=$row[1]." ".$row[2];
	$_SESSION['propic']=$row[7];
	header("Location:readblog.php");
	$flag=1;
	}
	}
	
	if($flag==0)
	{
	echo "**Invalid Email ID or Password**";
	}
}
?>
<html>
<script>
function validate()
{
var emailID = document.loginform.email_id.value;
var atpos = emailID.indexOf("@");
var dotpos = emailID.lastIndexOf(".");
var a=0;
if (atpos ==0 || ( dotpos - atpos < 2 ))
{
alert("Please enter correct Email-Id");
document.loginform.email_id.focus() ;
a=1;
}
if(document.loginform.email_id.value=="")
{
alert("Email-Id cannot be empty");
a=1;
}
if(document.loginform.pass.value=="")
{
alert("Password cannot be empty");
a=1;
}
if(a==1)
return false;
else 
return true;
}
</script>

<body style="text-align:center" background="mosaic.jpg">
<br><br><br><br>
<div class="card">
<form action=" " method="POST" name="loginform" onsubmit="return validate();">
<p>
<input type="text" name="email_id"  class="textfield" placeholder="Email-Id"/>
<p>
<input type="password" name="pass" class="textfield" placeholder="Password"/>
<p>
<input type="submit" name="submitlogin" class="button" value="LOGIN" onmouseover="this.style.backgroundColor='#004d00';return true;" onmouseout="this.style.backgroundColor=''; return true;">
</form>
</div>
</body>
</html>
<?php
include_once("class.html");
?>