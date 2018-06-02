<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Izmjena Korisnika";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
	?>

<p>
<span class="trt1"><a href="admin_izmjena_korisnika.php" style="text-decoration: none"><input type="submit" value="Korisnici" /></a></span>

<span class="trt1"><a href="dodaj_b.php" style="text-decoration: none"><input type="submit" value="Dodaj Novog Korisnika" /></a></span>

</p>

<?php
require('db.php');

$sql = "SELECT * FROM users";

$result = mysqli_query($con,$sql)or die(mysqli_error());

echo "<table style='width: 100%;'>";
echo "<tr><th>Korisnicko Ime</th><th>Elektronska Posta</th></tr>";

while($row = mysqli_fetch_array($result)) {
	$izmjeni45 = 'pocetna.php';
    $korisnicko_ime = $row['username'];
    $elektronska_posta = $row['email'];
    $lozinka = $row['password'];
	
	
	if ($row['blokiraj'] == 1)
	{
		$lopovi_politicari = "<span class=\"trt\"><a href=\"deblokiraj_b.php?id=$row[id]\" 
		style=\"text-decoration: none\"><input type=\"submit\" value=\"Deblokiraj\" />
		</a></span>";
		$crv = "<div class =\"crv\">BLOKIRAN</div>";
		}
	else {
		$lopovi_politicari = "<span class=\"trt\"><a href=\"blokiraj_b.php?id=$row[id]\" 
		style=\"text-decoration: none\"><input type=\"submit\" 
		value=\"Blokiraj\" /></a></span>";
		$crv = "";
	}
	
		echo "<tr>
	<td style='width: 200px;'>".$korisnicko_ime."</td>
	<td style='width: 200px;'>".$elektronska_posta."</td>
	<td>".$crv."</td>
	<td>".$lopovi_politicari."
	<span class=\"trt\"><a href=\"izmjeni_b.php?id=$row[id]\" style=\"text-decoration: none\"><input type=\"submit\" value=\"Izmjeni\" /></a></span>
	<span class=\"trt\"><a href=\"obrisi_b.php?id=$row[id]\" style=\"text-decoration: none\"><input type=\"submit\" value=\"Obrisi\" /></a></span>
	</td></tr>";
		
	
} 

echo "</table>";
mysqli_close($con);
?>

<?php
	
	require_once "./template/footer.php";
?>