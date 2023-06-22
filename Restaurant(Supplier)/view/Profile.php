<?php
session_start();
if(count($_SESSION)===0){
  header("Location: logout.php");
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php
      require '../controller/Header.php';
    ?>
  <body><br><br>
    <hr>
    <center><h1>Hello!! <?php echo $_SESSION['username']; ?></h1></center>
    <hr>
    <form action="edit_profile.php">
  		<br>
  		<fieldset>
  			<br>


  				<p >First Name : &nbsp; Maruf</p>

  				<p >Last Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mia</p>

  			<p >Gender : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Male</p>

  				<p >Birthday : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 22january2000</p>

  			<p >Religion : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Muslim</p>

        <p >Phone : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 01783792456</p>

  				<p >Email Address : &nbsp;&nbsp; maruf@gmail.com</p>

  		<p >Web Link : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; facebook.com</p>

        	<p >Present Address : &nbsp;&nbsp; Bosundhora</p>

          	<p >Permanent Address : &nbsp;&nbsp; Gazipur</p>
  			<br>
  		</fieldset>

  		<p align="right"> <input type="submit" name="Edit Profile" value="Edit Profile" style="width: 12%;"></P>
  	</form><br><br>

    <?php
   include "../controller/Footer.php";
   ?>

  </body>
</html>
