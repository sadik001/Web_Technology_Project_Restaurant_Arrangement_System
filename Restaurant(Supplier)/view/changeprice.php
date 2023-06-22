<?php
  if (($_SERVER["REQUEST_METHOD"] == "POST")){
    $program = $_POST['Program'];
    $Type = $_POST['Type'];
    

        if (empty($program) or empty($Type)) {
          echo "Please fill up the form properly";
        }
        else {

             $myfile = fopen('../model/updateprice.txt', 'a');
          $myuser = $program . "|" . $Type. "\r\n";
            fwrite($myfile, $myuser);
            fclose($myfile);
          

          echo "Price Updates Successfully";
        }
}
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php
      require '../controller/header.php';
    ?>
  <body>
    <br><br><br><hr>
     <i><center><h1>Change Product's Price</h1></center></i>
     <hr>
      <br><br>
      <center><table border="7" align = "right">
      <thead>
      <tr>
       <th>Product Number</th>
       <th>Product Name</th>
       <th>Product Details</th>
       <th>Pervious Price</th>
       <th>Updated Price</th>
       <th>Entry Date</th>
      </tr>
      </thead>
      <tbody>
        <tr>
       <td>01</td>
       <td>Burger</td>
       <td>Soft</td>
       <td>350</td>
       <td><?php echo $Type;?></td>
       <td>7/1/22</td>
      </tr>
      </tbody>
    </table></center>
    
  
   <center><form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <fieldset>
      <i><center><legend><h2>Product Price Update</h2></legend></center></i><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prodcut ID: <input type="text" name="Program" value=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
    Product Updated Price : <input type="text" name="Type" value=""><br><br>
    
    <center><input type="submit" class="btn btn-info" name="submit"  value="Post"></center>

</fieldset>

</form></center><br><br>
  </body>
</html>
