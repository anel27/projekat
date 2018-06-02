<?php 

//////// blok 
		include('db.php');
		if (!empty($_COOKIE["korisnicko_ime"])) {
               
			   
			   $kolak = $_COOKIE["korisnicko_ime"];

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

		$sql = "SELECT blokiraj FROM `users` WHERE username='$kolak'";
		$result1 = mysqli_query($con, $sql);
		 while($row = mysqli_fetch_assoc($result1)) {
	    $blokic = $row['blokiraj'];
	
		if ($blokic== 1 ){header("Location: vi_ste_blokirani.php");}
		else {
			header("Location: pocetna.php");
		}
    }
   }
   else 
   {
	header("Location: pocetna.php");   
   }
				
	mysqli_close($con);
	
	?>