<!DOCTYPE html>
<html>
<head>
	<title>Supplier Login</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
include "../controller/Header1.php";
?>
</head>
  <body>
<br><br>

   <form action="../controller/SupplierAction.php" method="POST">
      <fieldset>
       <i><center><legend><h2>Supplier Login</h2></legend></center></i><br>
        <center>Supplier Username :*&nbsp&nbsp&nbsp <input type="text" name="name" placeholder="Username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] :"" ?>"></center><br><br>
        <center>Supplier Password :*&nbsp&nbsp&nbsp <input type="password" name="password" placeholder="Password" value=""></center><br>
						
				

      </fieldset><br>
         <center><input type="submit" class="btn btn-info" name="submit" style="width:200px;" value="Submit"></center>
    </form><br>

		<form action="Supplier_Register.php">
		  <center><input type="submit" class="btn btn-info" name="submit" style="width:200px;" value="
SignUp"></center>

</form><br><br><br>
  </body>
	<?php
 include "../controller/Footer.php";
 ?>
</html>
