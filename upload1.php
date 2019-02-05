<?php
$target_dir = "upload/";
$target_file = $target_dir .basename($_FILES["propic"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$newfilename=$_POST['email_id'].'.'.$imageFileType;
// Check if image file is a actual image or fake image
echo "<center>";
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["propic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image.";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["propic"]["size"] > 110000000000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["propic"]["tmp_name"], $target_dir.$newfilename)) {
	
        echo " The file ". basename( $_FILES["propic"]["name"]). " has been uploaded. ";
	
	$connection=mysqli_connect('localhost','root', '', 'projectblog');

	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$dob=$_POST['dob'];
	$sex=$_POST['sex'];
	$email_id=$_POST['email_id'];
	$pass=$_POST['pass'];
	$propic=$newfilename;
	
	$hash="$2y$11$";
	$salt="NOONECANHAVEFAMENMONEY";
	$hash_n_salt=$hash . $salt;
	$pass=crypt($pass, $hash_n_salt);
	


	$query="INSERT INTO LOGIN(Firstname, Lastname, DOB, Gender, Email_id, Password, Propic) values('$firstname', '$lastname', '$dob', '$sex', '$email_id', '$pass', '$propic')";
	if(mysqli_query($connection, $query))
	header("Location:login.php");
	else
	{
	echo "<script> alert(\"Maybe Email-Id you entered already exist in our database. Please try something else.\");</script>";
	header("Location:signup.php");
	}    
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 

echo "</center>";
?>