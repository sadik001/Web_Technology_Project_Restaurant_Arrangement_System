
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
		 $BdErr = "Entrydate is required";
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

 if ($unErr ==""&& $passErr==""&&$fnameErr==""&&$lErr==""&&$BdErr==""&&$relerr==""&&$prerr==""&&$pererr==""&&$phoneerr==""&&$emailerr==""&&$linkerr=="") {
 	// code...
	if (file_exists("../model/admindata.json")){
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
		$firstname = validate($firstname);
		$lastname = validate($lastname);
		$gender = validate($gender);
		$u_birthday = validate($u_birthday);
		$Religion = validate($Religion);
		$u_address = validate($u_address);
		$per_address =validate($per_address );
		$Phone  = validate($Phone );
		$u_link = validate($u_link);
		$mail = validate($mail);
		$u_name = validate($u_name);
		$pass = validate($pass);

	            $current_content = file_get_contents("../model/admindata.json");
	            $array_content = json_decode($current_content, true);
	            $new_content = array(
	                'FirstName' => $_POST["firstname"],
	                'Lastname' => $_POST["lastname"],
	                'Username' => $_POST["u_name"],
	                'Password' => $_POST["pass"],
	                'Gender' => $_POST["gender"],
	                'DOB' => $u_birthday,
									'Religion'=>$Religion,
									'Phone'=>$Phone,
									'Email'=>$mail,
									'Permanent Address'=>$per_address,
									'Present Address'=>$u_address,
	                 'Link'=>$u_link
	                );
	            $array_content[] = $new_content;
	            $final_content = json_encode($array_content, JSON_UNESCAPED_SLASHES);
	            if (file_put_contents("../model/admindata.json", $final_content)) {
	               		echo "Registration Successful";
	            }
	        }
	else{
		echo "Server Error...";
	}
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
	<title>Resource Form</title>
</head>
<?php
      require '../controller/Header.php';
    ?>
<body>

<center><h1>Save Recources</h1></center>


	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <fieldset>
			 <center><legend><i><h2>Resource Information</h2></legend></i></center><br>

		Resource Name:* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="firstname" placeholder="Name" value="<?php echo $f_name;?>">
		<?php if ($fnameErr != "")
											 {
											 echo "*";
											 echo $fnameErr;
									 }
									 ?>

		<br><br>

		 Resource Type:* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="lastname" placeholder="Type" value="<?php echo $l_name;?>">
		 <?php if ($lErr != "")
												{
												echo "*";
												echo $lErr;
										}
										?>
		<br><br>
    Catagory*:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

      <input type="radio"  name="gender" class="gender"  value="Sigle Resource" >Cheap Resource
      <input type="radio" name="gender" class="gender"  value="Expensive" >Expensice Resource
			<input type="radio" name="gender" class="gender"   value="Other" >Other
      <br><br>
   Entery Date :*&nbsp&nbsp <input  type="date" name="u_birthday" value="<?php echo $b_day;?>">
	 <?php if ($BdErr != "")
											{
											echo "*";
											echo $BdErr;
									}
									?>
	 <br><br>
   Shelf Number:*&nbsp &nbsp&nbsp	&nbsp	&nbsp	&nbsp&nbsp<select class="religion" name="Religion" value="<?php echo $rel;?>">

                                 <option> Select  Number </option>
																 <option>1</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>

                             </select>
														 <?php if ($relerr != "")
													 											{
													 											echo "*";
													 											echo $relerr;
													 									}
													 									?>

														 <br><br>
		Resource Details:* &nbsp	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="Address" name="Address" placeholder="Resource Details" value="<?php echo $pread;?>"/>
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
