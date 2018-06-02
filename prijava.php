
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Prijava</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
	
	
	
	
  
    if (isset($_POST['username'])){
		
		
		$username = stripslashes($_REQUEST['username']); 
		$username = mysqli_real_escape_string($con,$username); 
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		
        if($rows==1 ){
			
			
			$_SESSION['username'] = $username;
			
			setcookie("korisnicko_ime", $username, time()+30*24*60*60);
			unset($_SESSION['admin']);
			header("Location: pocetna.php");
			
            }
			
			
			if($username=='admin'){
				
				setcookie("korisnicko_ime", "admin", time()+30*24*60*60);
			$_SESSION['admin'] = 'admin';
			unset($_SESSION['username']);
			header("Location: pocetna.php");
			
            }
			
			
			
			
			else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='prijava.php'>Prijava</a></div>";
				}
    }else{
?>
<div class="form">
<h1>Prijava</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Prijavi se" />
</form>
<p>Niste jos registrovani? <a href='registracija.php'>Registruj se OVDJE</a></p>

<br /><br />

</div>
<?php } ?>


</body>
</html>
