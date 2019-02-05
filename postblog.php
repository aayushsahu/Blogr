<?php
include_once("class.html");
include_once("topbar.php");
include_once("functions.php");
if(isset($_POST['share']))
{
$j=0;
$attachment="";
foreach($_FILES["sharedpic"]["tmp_name"] as $key => $tmp_name )
{
$target_dir = "upload/sharedpics/";
$target_file = $target_dir .basename($_FILES["sharedpic"]["name"][$key]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$newfilename=$_SESSION['email_id']."(1)";
$i=1;
// Check if image file is a actual image or fake image
echo "<font color=\"red\"><center>";
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["sharedpic"]["tmp_name"][$key]);
    if($check !== false) {
        echo "File is an image.";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["sharedpic"]["size"][$key] > 110000000000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}
else 
{
    while(file_exists($target_dir.$newfilename.'.'.$imageFileType))
    {
	if($i>=100)
	$newfilename=substr($newfilename, 0,-5);
	else
	if($i>=10)
	$newfilename=substr($newfilename, 0,-4);
	else
	if($i>0)
	$newfilename=substr($newfilename, 0,-3);
	$i++;
	$newfilename=$newfilename.'('.$i.')';
	
    }
	    if (move_uploaded_file($_FILES["sharedpic"]["tmp_name"][$key], $target_dir.$newfilename.'.'.$imageFileType))
	    {
		echo "**The file ". basename( $_FILES['sharedpic']['name'][$key])." has been uploaded.**";
	    	$attachment[$j]= $newfilename.'.'.$imageFileType;
		$j++;
	    }
	    else
	    {
		echo "**Please retry uploading your attachments**";
	    }
}
echo "</font></center>";
}
	$email_id=$_SESSION['email_id'];
	$blog=$_POST['blogarea'];
	date_default_timezone_set("Asia/Kolkata");
	$date=date("y-m-d");
	$day=date("l");
	$time=date("H:i:s");
	$connection=mysqli_connect('localhost','root', '', 'projectblog');
        $query="INSERT INTO blogs(Email_id, Blog, Likes, Date, Day, Time) values('$email_id', '$blog', 0, '$date', '$day', '$time')";
	mysqli_query($connection, $query);
	$query2="Select blog_id from blogs ORDER BY blog_id DESC LIMIT 1";
	$result2=mysqli_query($connection, $query2);
	$blog_id=mysqli_fetch_row($result2);
	

	foreach($attachment as $a)
	{
	$query="INSERT INTO attachments(blog_id, attachment, likes) values($blog_id[0], '$a', 0)";
	mysqli_query($connection, $query);
	}
	echo "<center><font color=\"red\">**Data has been successfully saved in database**</font></center>";

}
?>
<html>
<script>
function validatetextarea()
{
if(document.blog.blogarea.value=="" && document.blog.sharedpic.value=="")
{
alert("YOUR BLOG CANNOT BE EMPTY");
return false;
}
else
{
return true;
}
}
</script>
<body background="honeycomb3.jpg">
<center>
<br><br>
<div class="card1">
<br><br>

<form action=" " method="post" name="blog" onsubmit="return validatetextarea();" enctype="multipart/form-data">
<textarea rows="8" cols="70" name="blogarea" class="blogarea textfield" placeholder="WRITE YOUR FEELING, EXPERIENCE OR VIEWS">
</textarea><br><br>
<img class="circlesmall imgsmall1" src="bee.jpg">
<input type="file" id="sharedpic" name="sharedpic[]" multiple="" onchange="loadFile(event)" class="circlesmall imgsmall2 ">
<br>
<img id="output" class="recpreview"/>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);

};
</script>
<br><br>
<button type="submit" name="share" class="button button1" onmouseover="this.style.backgroundColor='#004d00';return true;" onmouseout="this.style.backgroundColor=''; return true;">SHARE</button>
</form>
</div>
</center>
</body>
</html>
