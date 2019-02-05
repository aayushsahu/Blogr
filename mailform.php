<?php
include("class.html");
include("topbar.php");

if(isset($_POST['SEND']))
{
$connection=mysqli_connect('localhost','root', '', 'projectblog');
$to=$_POST['to'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$from=$_SESSION['email_id'];

$query="Select * from login where Email_id='$to'";
$result= mysqli_query($connection, $query);
$row=mysqli_fetch_row($result);

if(!empty($row[0]))
{
mail($to, $subject, $message, $from);

echo "<script> alert(\"YOUR MESSAGE TO \'$row[0] $row[1]\' HAS BEEN SENT SUCCESSFULLY\");</script>";
}
else
{
echo "<script>alert(\"RECEIVERS EMAIL ID NOT FOUND\");</script>";
}
}
?>

<html>
<body>
<form action="" method="post">
<center>
<div class="card1">
<input type="text" class="textfield" name="to" placeholder="receiver email address"><br><br>
<input type="text" name="subject" class="textfield" placeholder="Subject"><br><br>
<textarea rows=10 cols=60 class="blogarea textfield" name="message" placeholder="Type your message here..."></textarea><br><br>
<input type="submit" class="button" name="SEND" value="SEND" onmouseover="this.style.backgroundColor='#004d00';return true;" onmouseout="this.style.backgroundColor=''; return true;">
</div>
</center>
</form>
</body>