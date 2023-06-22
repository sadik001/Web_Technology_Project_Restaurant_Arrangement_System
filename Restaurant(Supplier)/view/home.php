

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
    <center><h1>Welcome <?php echo $_SESSION['username']; ?></h1></center>
    <hr><br><br>

   <center><form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <fieldset>
      <i><center><legend><h2>Product Management</h2></legend></center></i><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shortage Product Name : <input type="text" name="Program" value=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Product Type : <input type="text" name="Type" value=""><br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last  Date For Product: <input type="date" name="start" value=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
   Phone Number: <input type="number" name="mobile" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   Product Details: <textarea type="text" name="Post" value=""></textarea><br><br>
    <center><input type="submit" class="btn btn-info" name="submit"  value="Post"></center>

</fieldset>

</form></center><br><br>

   	<?php
  if (($_SERVER["REQUEST_METHOD"] == "POST")){
    $program = $_POST['Program'];
    $Type = $_POST['Type'];
    $Start = $_POST['start'];
    $phone = $_POST['mobile'];
    $post = $_POST['Post'];

   			if (empty($program) or empty($Type)  or empty($Start) or empty($phone) or empty($post)) {
   				echo "Please fill up the form properly";
   			}
   			else {

   				   $myfile = fopen('../model/post.txt', 'a');
          $myuser = $program . "|" . $Type. "|" . $Start. "|" . $phone .  "|" . $post . "\r\n";
            fwrite($myfile, $myuser);
            fclose($myfile);
   				

   				echo "Posted Successfully";
   			}
}
   	?>
   </body>
    <form action="edit_profile.php" method="POST">
     <br>
     <fieldset>
       <br>
         <i><center><legend><h2>Shortage Products</h2></legend></center></i><br>
       <p style="font-size:18px">Product Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $program;?></p>

       <p style="font-size:18px">Product Type : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $Type;?></p>

       <p style="font-size:18px">Delivary Time : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo   $Start;?></p>

        <p style="font-size:18px">Mobile Number : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $phone;?></p>
        <p style="font-size:18px">Product Details : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $post;?></p>

       <br>
     </fieldset>

   </form><br><br>
    <?php
       include "../controller/Footer.php";
       ?>
  </body>
</html>
