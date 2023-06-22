
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
			$fnameErr = "Product is required..";
	}
	else {
			if ((!preg_match("/^[a-zA-Z-'. ]*$/", $_POST["firstname"])) or (str_word_count($_POST["firstname"]) < 2)) {
					$nameErr = "At least two words and Alphabets only";
			}
	}
	if (empty($_POST['lastname']))
{
		$lErr = "Type is required";
}
	 if (empty($_POST["u_birthday"]))
 {
		 $BdErr = "Update date is required";
 }
 if (empty($_POST["Religion"]))
{
	 $relerr = "Religion is required";
}
if (empty($_POST["Address"]))
{
	$prerr = "Update Commitment is required";
}
if (empty($_POST["Permanent"]))
{
	$pererr = "Resource details is required";
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

 
 }
 function validate($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Commitments</title>
</head>
<?php
      require '../controller/Header.php';
    ?>
<body>

<center><h1>Delivary Commitments</h1></center>


	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <fieldset>
			 <center><legend><i><h2>Update Commitments</h2></legend></i></center><br>

    
   Commitment Update Date:*&nbsp&nbsp <input  type="date" name="u_birthday" value="<?php echo $b_day;?>">
	 <?php if ($BdErr != "")
											{
											echo "*";
											echo $BdErr;
									}
									?>
	 <br><br>
   
														 <br><br>
		Commitment:* &nbsp	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="Address" name="Address" placeholder="Update Commitment" value="<?php echo $pread;?>"/>
<?php if ($prerr != "")
									 {
									 echo "*";
									 echo $prerr;
							 }
							 ?>

<br><br>
  </fieldset><br>
  
<center><input type="submit" class="btn btn-info" name="submit" style="width:200px;" value="Save"><center>
</form><br><br>

<?php
include "../controller/Footer.php";
?>
</body>
</html>
