<?php
ob_start();
include("class.html");
include_once("topbar.php");
if(isset($_POST['comment_submit']) && !empty($_POST['comment_content']))
{
$connection=mysqli_connect('localhost','root','','projectblog');
$blog_id=$_GET['blog_id'];
$flname=$_SESSION['flname'];
$email_id=$_SESSION['email_id'];
$comment_content=$_POST['comment_content'];
date_default_timezone_set("Asia/Kolkata");
$comment_date=date("y-m-d");
$comment_time=date("H:i:s");
$query="insert into comments (blog_id,comment_flname, comment_email_id, comment_content, comment_likes, comment_date, comment_time) values( $blog_id,'$flname','$email_id','$comment_content',0,'$comment_date','$comment_time')";
$result=mysqli_query($connection, $query);
//echo mysqli_error($query);
header("Location: readblog.php");
}
ob_end_flush();
?>
<html>
<body>
<center>
<div class="card1">
<form method="POST" action="" enctype="multipart/form-data">
<textarea name="comment_content" class="blogarea textfield" rows="2" cols="40" placeholder="Enter Your Comment"></textarea>
<br>
<input type="submit" class="button" value="comment" name="comment_submit">
</form>
</div>
</center>
</body>
</html>