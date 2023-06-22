<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php
      require '../controller/Header.php';
    ?>
  <body>
    <center><h2>Confirm</h2></center>
    <form action="delivary_commitment.php" method="GET">
      <fieldset>
        <i><h4>Do you want to update delivary commitments?</h4></i>
      </fieldset><br>
      <center><input type="submit" class="btn btn-info" name="submit" style="width:200px;" value="
Yes"><center>

</form><br>
<form action="home.php" method="GET">
  <center><input type="submit" class="btn btn-info" name="submit" style="width:200px;" value="
No"><center>

</form>
  </body>
</html>
