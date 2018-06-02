 <?php
include('db.php');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

//

//
$b56 = $_GET['id'];


                 $sql = "UPDATE `users` ". "SET `blokiraj` = '1' ". 
               "WHERE `id` = '$b56'" ;
                 

			   if (mysqli_query($con, $sql)) {
      echo "Uspjesno smo blokirali korisnika";
	  header("Location: admin_izmjena_korisnika.php");
   } else {
      echo "Nismo uspjeli da blokiramo korisnika,mozda korisnik ne postoji: " . mysqli_error($con);
   }

?>
