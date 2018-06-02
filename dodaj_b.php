<html>
   
   <head>
      <title>Izmjena Podataka</title>
	  <link rel="stylesheet" href="css/style.css" />
   </head>
   
   <body>

<?php

	require_once "./template/header.php";


?>
   <p><span class="trt1"><a href="admin_izmjena_korisnika.php" style="text-decoration: none"><input type="submit" value="Korisnici" /></a></span>
		<span class="trt1"><a href="dodaj_b.php" style="text-decoration: none"><input type="submit" value="Dodaj Novog Korisnika" /></a></span></p>
<?php
	require('db.php');
   
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); 
		$username = mysqli_real_escape_string($con,$username);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
           header("Location: admin_izmjena_korisnika.php");
        }
    }else{
?>
<div class="form">

<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Dodaj" />
</form>
<br /><br />

</div>
<?php } ?>
      <?php
	
	require_once "./template/footer.php";
?>
   </body>
</html>