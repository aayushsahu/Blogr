<?php
session_start();
if(isset($_SESSION['email_id']))
{
session_destroy();
}
header("Location:login.php");
?>