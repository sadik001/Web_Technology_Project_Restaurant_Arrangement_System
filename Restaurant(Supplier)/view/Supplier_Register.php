<?php
$un = $pass =$f_name=$l_name =$b_day=$rel=$pread=$peread=$phone=$email=$link="";


$unErr =$passErr=$fnameErr=$lErr=$BdErr=$relerr=$prerr=$pererr=$phoneerr=$emailerr=$linkerr="";
if (($_SERVER["REQUEST_METHOD"] == "POST"))
	 {

if (empty($_POST["u_name"]))
 {
 $unErr = "Enter user name";
 }
 else
 {
		if ( (str_word_count($_POST["u_name"]) < 2))
			{
						 $unErr = "At least two characters and Alphabets only";
				 }
			 elseif (!preg_match('/^[A-Za-z0-9\s.-._]+$/', $_POST["u_name"]))
			 {
				 $unErr= "User Name must contain alpha numeric characters, period, dash or underscore only!";
			 }

		}

	if (empty($_POST["pass"]))
	{
	$passErr = "Please enter password";
	}
	else
	{
		if (strlen($_POST["pass"]) < 8) {
			$passErr = "Your Password Must Contain At Least 8 Digits !"."<br>";
	}
	elseif(!preg_match("#[0-9]+#",$_POST["pass"])) {
			$passErr = "Your Password Must Contain At Least 1 Number !"."<br>";
	}
	elseif(!preg_match("#[A-Z]+#",$_POST["pass"])) {
			$passErr= "Your Password Must Contain At Least 1 Capital Letter !"."<br>";
	}
	elseif(!preg_match("#[a-z]+#",$_POST["pass"])) {
			$passErr= "Your Password Must Contain At Least 1 Lowercase Letter !"."<br>";
	}
	elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["pass"])) {
			$passErr= "Your Password Must Contain At Least 1 Special Character !"."<br>";
	}





		}
		if (empty($_POST["firstname"]))
	{
			$fnameErr = "Firstname is required..";
	}
	else {
			if ((!preg_match("/^[a-zA-Z-'. ]*$/", $_POST["firstname"])) or (str_word_count($_POST["firstname"]) < 2)) {
					$nameErr = "At least two words and Alphabets only";
			}
	}
	if (empty($_POST['lastname']))
{
		$lErr = "Lastname is required";
}
	 if (empty($_POST["u_birthday"]))
 {
		 $BdErr = "Birthday is required";
 }
 if (empty($_POST["Religion"]))
{
	 $relerr = "Religion is required";
}
if (empty($_POST["Address"]))
{
	$prerr = "Present Address is required";
}
if (empty($_POST["Permanent"]))
{
	$pererr = "Present Address is required";
}
if (empty($_POST["Phone"]))
{
	$phoneerr = "Phone Number is required";
}
else if (strlen($_POST["Phone"]) != 11) {
		$phoneerr = "Your Phone Number Must Contain Exactly 11 Digits !"."<br>";
}

if (empty($_POST["urlink"]))
{
	$linkerr = "Your personal link is required";
}
if (empty($_POST["mail"]))
{
	$emailerr = "Your email is required";
}
 if ($unErr ==""&& $passErr==""&&$fnameErr==""&&$lErr==""&&$BdErr==""&&$relerr==""&&$prerr==""&&$pererr==""&&$phoneerr==""&&$emailerr==""&&$linkerr=="") {
 	// code...
	if (file_exists("../model/supplydata.txt")){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$u_birthday = $_POST['u_birthday'];
		$gender = $_POST['gender'];
		$Religion = $_POST['Religion'];
		$u_address = $_POST['Address'];
		$per_address = $_POST['Permanent'];
		$Phone = $_POST['Phone'];
		$u_link = $_POST['urlink'];
		$mail = $_POST['mail'];
		$u_name = $_POST['u_name'];
		$pass = $_POST['pass'];
	
 
       
      $myfile = fopen('../model/supplydata.txt', 'a');
      $myuser = $firstname . "|" . $lastname . "|" . $u_birthday. "|" . $gender . "|" . $Religion . "|" . $u_address ."|" . $per_address . "|" . $Phone. "|". $u_link . "|" . $mail . "|" . $u_name. "|" . $pass . "\r\n";
            fwrite($myfile, $myuser);
            fclose($myfile);
            header('location:./Supplier_Login.php');
        
	        }
	else{
		echo "Server Error...";
	}

}
 }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
</head>

<body>

<center><h1>Supplier Entry Form</h1></center>


	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<fieldset>
		   <center><legend><i><h2>Account Information</h2></legend></i></center>
		   Username:* &nbsp&nbsp&nbsp<input type="text" name="u_name" placeholder="Username" value="<?php echo $un;?>">
			 <?php
									if ($unErr != "")
									{
											echo "* ";
											echo $unErr;
									}
									?>
				<br><br>
		   Password:*&nbsp&nbsp&nbsp <input type="password" name="pass" placeholder="Password" value="<?php echo $pass;?>">
			 <?php if ($passErr != "")
										 {
										 echo "*";
										 echo $passErr;
								 }
								 ?>
			 <br><br>
		</fieldset><br>
    <fieldset>
			 <center><legend><i><h2>Basic Information</h2></legend></i></center><br>

		First Name:* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="firstname" placeholder="FirstName" value="<?php echo $f_name;?>">
		<?php if ($fnameErr != "")
											 {
											 echo "*";
											 echo $fnameErr;
									 }
									 ?>

		<br><br>

		 Last Name:* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="lastname" placeholder="Lastname" value="<?php echo $l_name;?>">
		 <?php if ($lErr != "")
												{
												echo "*";
												echo $lErr;
										}
										?>
		<br><br>
    Gender*:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

      <input type="radio"  name="gender" class="gender"  value="Male" >Male
      <input type="radio" name="gender" class="gender"  value="Female" >Female
			<input type="radio" name="gender" class="gender"   value="Other" >Other
      <br><br>
   Date of Birth :*&nbsp&nbsp <input  type="date" name="u_birthday" value="<?php echo $b_day;?>">
	 <?php if ($BdErr != "")
											{
											echo "*";
											echo $BdErr;
									}
									?>
	 <br><br>
   Religion:*&nbsp &nbsp&nbsp	&nbsp	&nbsp	&nbsp&nbsp<select class="religion" name="Religion" value="<?php echo $rel;?>">

                                 <option> Select  Religion </option>
																 <option>Hindhu</option>
                                 <option>Muslim</option>
                                 <option>Christian</option>
                                 <option>Jews</option>
                                 <option>Buddhist</option>

                             </select>
														 <?php if ($relerr != "")
													 											{
													 											echo "*";
													 											echo $relerr;
													 									}
													 									?>

														 <br><br>
  </fieldset><br>
  <fieldset>
<center><legend><i><h2>Contact Information</h2></legend></i></center>
Present Address:* &nbsp	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="Address" name="Address" placeholder="Present Address" value="<?php echo $pread;?>"/>
<?php if ($prerr != "")
									 {
									 echo "*";
									 echo $prerr;
							 }
							 ?>

<br><br>
Permanent Address:* &nbsp&nbsp&nbsp&nbsp<input type="text" name="Permanent" placeholder="Permanent Address" value="<?php echo $peread;?>">
<?php if ($pererr != "")
									 {
									 echo "*";
									 echo $pererr;
							 }
							 ?>
<br><br>

Phone Number:* &nbsp	&nbsp&nbsp&nbsp&nbsp&nbsp	&nbsp&nbsp&nbsp<input type="tel" name="Phone" placeholder="Phone Number"value="<?php echo $phone;?>">
<?php if ($phoneerr != "")
									 {
									 echo "*";
									 echo $phoneerr;
							 }
							 ?>
<br><br>
Email:* &nbsp	&nbsp&nbsp	&nbsp &nbsp	&nbsp&nbsp&nbsp&nbsp&nbsp	&nbsp&nbsp	&nbsp&nbsp	&nbsp&nbsp	&nbsp<input  type="email" name="mail"  placeholder="Email" value="<?php echo $email;?>">
<?php if ($emailerr != "")
									 {
									 echo "*";
									 echo $emailerr;
							 }
							 ?><br><br>
Personal URL:* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="url" name="urlink" placeholder="Personal Link" value="<?php echo $link;?>">
<?php if ($linkerr != "")
									 {
									 echo "*";
									 echo $linkerr;
							 }
							 ?><br><br>
<br><br>
</fieldset><br>

<center><input type="submit" class="btn btn-info" name="submit" style="width:200px;" value="Submit"><center>
</form><br><br>
<form action="Supplier_Login.php">
		  <center><input type="submit" class="btn btn-info" name="submit" style="width:200px;" value="
Go Back to login"></center>

</form><br><br><br>
<?php
include "../controller/Footer.php";
?>
</body>
</html>
