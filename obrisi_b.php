
   
   <?php
include('db.php');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

//

//
$b56 = $_GET['id'];

$sql = "DELETE FROM users WHERE id = '$b56'";
// sql to delete a record


if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
	header("Location: admin_izmjena_korisnika.php");
} else {
    echo "Error deleting record: " . $con->error;
}

$con->close();




?>
