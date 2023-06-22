
<?php
 $passErr="";
  if ($_SERVER['REQUEST_METHOD'] === "POST" & count($_REQUEST) >0) {
    $username = $_POST['name'];
    $newpass = $_POST['newpass'];
    $Confirmpass = $_POST['Confirmpass'];

      if ($newpass)
      {
      $passErr = "Please enter password";
      }
      else
      {
        if (strlen($newpass) < 8) {
          $passErr = "Your Password Must Contain At Least 8 Digits !"."<br>";
      }
      elseif(!preg_match("#[0-9]+#",$_POST["newpass"])) {
          $passErr = "Your Password Must Contain At Least 1 Number !"."<br>";
      }
      elseif(!preg_match("#[A-Z]+#",$_POST["newpass"])) {
          $passErr= "Your Password Must Contain At Least 1 Capital Letter !"."<br>";
      }
      elseif(!preg_match("#[a-z]+#",$_POST["newpass"])) {
          $passErr= "Your Password Must Contain At Least 1 Lowercase Letter !"."<br>";
      }
      elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["newpass"])) {
          $passErr= "Your Password Must Contain At Least 1 Special Character !"."<br>";
      }

        }
    if(empty($username) or empty($Confirmpass)) {
    echo "Please fill up the form properly";
     echo "<br>";
    }

    if ($newpass == $Confirmpass){

      $username = validate($username);

      $data = file_get_contents("../model/admindata.json");
      $data = json_decode($data, true);
   if (!empty($data))
   {
    foreach ($data as $key => $row){
       if ($row["Username"] == $username){
         $data[$key]['Password'] = $newpass;

       file_put_contents('../model/admindata.json', json_encode($data));
       echo "Password Changed Successfully";
       break;

       }
    }
  }else {
    echo "Server Error..";
     echo "<br>";
  }
}
else {
  echo "Password Doesnot Match";
   echo "<br>";
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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forget Password</title>
  </head>
  <body>
   <center><h1>Forget Password</h1></center>
   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <fieldset>
      <legend><h3>Reset Password</h3></legend><br>
          <b>Enter Username :</b>*&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" placeholder="Username" ><br><br>
         <b>New Password :</b>*&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="password" name="newpass" placeholder="New Password" >
         <?php if ($passErr != "")
  										 {
  										 echo "*";
  										 echo $passErr;
  								 }
  								 ?>
                   <br><br>
        <b>Confirm Password :</b>*&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="password" name="Confirmpass" placeholder="Confirm Password"><br><br>
      </fieldset><br>
         <center><input type="submit" class="btn btn-info" name="submit"  value="Submit"></center>
    </form><br>

    <br><br><br><br><br><br>
    <form action="adminlogout.php" method="POST">
      <input type="submit"  name="submit"value="Login">

    </form>
  </body>
</html>
