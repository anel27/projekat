<?php
include('db.php');

// Create connection

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, username, email FROM users";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	
		
        echo "id: " . $row["id"]. " - Korisnicko Ime:: " . $row["username"]. " EMail:" . $row["email"]. "<br>";
		
		
		
    }
} else {
    echo "0 results";
}

mysqli_close($con);
?>