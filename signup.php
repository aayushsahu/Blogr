<?php
include_once("class.html");
?>
<html>
<script>
function validate()
{
var emailID = document.signupform.email_id.value;
var atpos = emailID.indexOf("@");
var dotpos = emailID.lastIndexOf(".");
var a=0;
if(document.signupform.firstname.value=="")
{
alert("Feild cannot be empty");
document.signupform.firstname.focus() ;
a=1;
}
if(document.signupform.lastname.value=="")
{
alert("Feild cannot be empty");
document.signupform.lastname.focus() ;
a=1;
}
if(document.signupform.dob.value=="")
{
alert("Feild cannot be empty");
document.signupform.dob.focus() ;
a=1;
}
if(document.signupform.sex.value=="")
{
alert("Feild cannot be empty");
document.signupform.sex.focus() ;
a=1;
}
if (atpos ==0 || ( dotpos - atpos < 1 ))
{
alert("Please enter correct email ID");
document.signupform.email_id.focus() ;
a=1;
}
if(document.signupform.email_id.value=="")
{
alert("Feild cannot be empty");
document.signupform.email_id.focus() ;
a=1;
}
if(document.signupform.password.value=="")
{
alert("Feild cannot be empty");
document.signupform.password.focus() ;
a=1;
}
if(document.signupform.cpassword.value!=document.signupform.password.value)
{
alert("Passwords do not match");
document.signupform.cpassword.focus() ;
a=1;
}

if(a==1)
return false;
else 
return true;
}
</script>
<body style="text-align:center" background="mosaic.jpg">
<br><br>
<b>REGISTER YOURSELF<b>
<br><br>
<div class="card">
<form action="upload.php" method="POST" name="signupform" onsubmit="return(validate());">

<input type="text" name="firstname" class="textfield" id="firstname" placeholder="Firstname"/>
<p>

<input type="text" name="lastname" class="textfield" id="lastname" placeholder="Lastname"/>
<p>

<b>DOB</b>
<input type="date" name="dob" class="textfield" id="dob" placeholder="dd-mmm-yyyy">
<p><br>

<input type="radio" name="sex" value="male" id="male">MALE
<input type="radio" name="sex" value="female" id="female">FEMALE
<p>

<input type="text" name="email_id" class="textfield" id="email_id" placeholder="E-mail Id"/>
<p>

<input type="password" name="pass" class="textfield" id="password" placeholder="Password"/>
<p>

<input type="password" name="cpass" class="textfield" id="cpassword" placeholder="Confirm Password"/>
<p>
<P><button class="button" type="submit" onmouseover="this.style.backgroundColor='#004d00';return true;" onmouseout="this.style.backgroundColor=''; return true;">NEXT</button>
<P><button class="button" type="reset" onmouseover="this.style.backgroundColor='#004d00';return true;" onmouseout="this.style.backgroundColor=''; return true;">RESET</button>

</form>
</div>
</body>
</html>



