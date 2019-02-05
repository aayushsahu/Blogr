<html>
<body background="mosaic.jpg">
<center>
<div class="card">
<form action="upload1.php" method="POST" enctype="multipart/form-data">


<input type="hidden" name="firstname" class="textfield" id="firstname" value="<?php echo $_POST['firstname'];?>"/>
<input type="hidden" name="lastname" class="textfield" id="lastname" value="<?php echo $_POST['lastname'];?>"/>
<input type="hidden" name="dob" class="textfield" id="dob" value="<?php echo $_POST['dob'];?>">
<input type="hidden" name="sex" value="<?php echo $_POST['sex'];?>">
<input type="hidden" name="email_id" class="textfield" id="email_id" value="<?php echo $_POST['email_id'];?>"/>
<input type="hidden" name="pass" class="textfield" id="password" value="<?php echo $_POST['pass'];?>"/>

<br><br><br><br><br><br><br><br>
<B><font color="red">SHOW YOUR LOOKS</font></B><br><br><br><br>
<img class="circle img1" src="bee.jpg">
<img id="output" class="circle img2"/>
<input type="file" onchange="loadFile(event)" class="circle img3 blank" name="propic" id="propic">


<script>
  var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<br><br>
<input class="button" type="submit" name="submit" onmouseover="this.style.backgroundColor='#004d00';return true;" onmouseout="this.style.backgroundColor=''; return true;">
</div>
</center>

</form>
</body>
</html>
<?php
include_once("class.html");
?>