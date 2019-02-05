<?php
ob_start();
include("topbar.php");
$comment_likes=$_GET['comment_likes'];
$comment_id=$_GET['comment_id'];
$blog_id=$_GET['blog_id'];
$email_id=$_SESSION['email_id'];
$connection=mysqli_connect('localhost','root', '','projectblog');

$flag=0;

$query="Select * from comment_likers where blog_id=$blog_id AND comment_id=$comment_id";
$result=mysqli_query($connection, $query);
$row=mysqli_fetch_row($result);
if(empty($row))
{
	$comment_likes=$comment_likes+1;
	$query1="update comments set comment_likes=$comment_likes where comment_id=$comment_id";
	$result1=mysqli_query($connection, $query1);
	$query2="insert into comment_likers values($blog_id, $comment_id, '$email_id')";
	$result2=mysqli_query($connection, $query2);
}


else
{
while($row)
{
	
	if($row[2]==$email_id)
	{
	$flag=1;
	}
	$row=mysqli_fetch_row($result);
}
if($flag==0)
{
	$comment_likes=$comment_likes+1;
	$query1="update comments set comment_likes=$comment_likes where comment_id=$comment_id";
	$result1=mysqli_query($connection, $query1);	
	$query2="insert into comment_likers values($blog_id, $comment_id, '$email_id')";
	$result2=mysqli_query($connection, $query2);	
}
}



header('location:'.$_SERVER['HTTP_REFERER']);
?>