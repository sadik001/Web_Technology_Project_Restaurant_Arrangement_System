<?php
	session_start();

	$uname = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile</title>
</head>
<?php
    require '../controller/header.php';
  ?>
<body>
	<br>
	<center> <h2>Edit Profile</h2></center>
	<br>
	<hr>
	<form method="POST" >
		<br>
		<fieldset>
			<br>
		 User Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['username'];?><br><br>
     First Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="firstname" placeholder="FirstName" value="Maruf">

			<br><br>

			Last Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="lastname" placeholder="Lastname"value="Mia">

 		<br><br>
		Phone Number:&nbsp&nbsp&nbsp&nbsp&nbsp	&nbsp&nbsp&nbsp<input type="tel" name="Phone" placeholder="Phone Number"value="01783793592">

		<br><br>

		Email:&nbsp&nbsp	&nbsp &nbsp	&nbsp&nbsp&nbsp&nbsp&nbsp	&nbsp&nbsp	&nbsp&nbsp	&nbsp&nbsp	&nbsp<input  type="email" name="mail"  placeholder="Email"value="maruf@gmail.com" >
	<br><br>
    Personal URL:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="url" name="urlink" placeholder="Personal Link" value="<?php echo $Web_Link;?>" >

								 	<br><br>
	Present Address: &nbsp	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="Address" name="Address" placeholder="Present Address" value="Boshundhora">
									<br><br>
		</fieldset>
		<p align="right"> <input type="submit" name="Save" value="Update" style="width: 10%;"></P>
	</form>
</body>
<?php
include "../controller/Footer.php";
?>
</html>
