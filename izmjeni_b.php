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
include('db.php');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

//

//
$b56 = $_GET['id'];
$sql = "SELECT username, email, password FROM users WHERE id = '$b56'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	
		
      
		$korisnicko_ime = $row["username"];
        $elektronska_posta = $row["email"];
		$lozinka = $row["password"];
		
		
    }
} else {
    echo "0 results";
}


?>



      <?php
	  //
         if(isset($_POST['update'])) {
           
           
			$hpassword = $_POST['vasa_lozinka'];
            $v_lozinka = md5($hpassword);
			
			
			
            
            $vase_korisnicko_ime5 = $_POST['vase_korisnicko_ime'];
			$vas_email5 = $_POST['vas_email'];
			$b58 = $row[id];
            
            
                 if (!empty($vas_email5)) {
                 $sql = "UPDATE `users` ". "SET `email` = '$vas_email5' ". 
               "WHERE `id` = '$b56'" ;
                  }

			   if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($con);
   }
			   
            
                if (!empty($hpassword)) {
                 $sql = "UPDATE `users` ". "SET `password` = '$v_lozinka' ". 
               "WHERE `id` = '$b56'" ;
                  }

    
      
             if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($con);
   }
   
    if (!empty($vase_korisnicko_ime5)) {
                 $sql = "UPDATE `users` ". "SET `username` = '$vase_korisnicko_ime5' ". 
               "WHERE `id` = '$b56'" ;
                  }
                 
if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($con);
   }
   
   
   
   mysqli_close($con);
   setcookie("korisnicko_ime", "", time()-360000);
   header("Location: admin_izmjena_korisnika.php");
         }
		 
		 
		 else {
			 //
			    


            ?>
			
			
			
			
			
			   <div class="form">
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Korisnicko Ime:</td>
                        <td><input name = "vase_korisnicko_ime" value="<?php echo $korisnicko_ime; ?>" type = "text" 
                           id = "vase_korisnicko_ime"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Elektronska Posta:</td>
                        <td><input name = "vas_email" value="<?php echo $elektronska_posta; ?>" type = "text" 
                           id = "vas_email"></td>
                     </tr>
                     
					 <tr>
                        <td width = "100">Lozinka:</td>
                        <td><input name = "vasa_lozinka" type = "text" 
                           id = "vasa_lozinka"></td>
                     </tr>
					 
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Sacuvaj">
                        </td>
                     </tr>
                  
                  </table>
               </form>
			   </div>
            <?php
         }
      ?>
      <?php
	
	require_once "./template/footer.php";
?>
   </body>
</html>