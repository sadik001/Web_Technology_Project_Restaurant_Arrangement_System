
    <?php
    
     if ($_SERVER['REQUEST_METHOD'] === "POST") {
			 $username = $_POST['name'];
			 $password = $_POST['password'];
			 $remember = isset($_POST['rememberme'])? $_POST['rememberme'] : null ;

				if(empty($username) or empty($password)){

					echo "Please fill up the form properly";
				}else {

       

        while (!feof($myfile)) {
        $myfile = fopen('../model/supplydata.txt', 'r');

        $data = fgets($myfile);
        $user = explode('|', $data);

        if ($username == trim($user[10]) && $password == trim($user[11])) {
          $isset=true;
           break;
        } 
      }

			if($isset){
           
					setcookie("username",$username, time()+ 3600);
					 
					 session_start();
					 $_SESSION['username'] = $username;
					 header("Location:../view/home.php");
					}
					else{

								echo "Your Username or Password is incorrect.";
					}
				}
			}

		 ?>
 <br><br><br>
 <form action="../view/Supplier_Login.php" method="GET">
			 <fieldset>
			 	<i><h3>Please Try again...</h3></i>
			</fieldset><br>
		 	<center><input type="submit" class="btn btn-info" name="submit"value="Try Again"><center>

		 </form>
