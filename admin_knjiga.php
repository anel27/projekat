<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "List book";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>
	
	
	<p><span class="trt1"><a href="admin_dodaj.php" style="text-decoration: none"><input type="submit" value="Dodaj Novu Knjigu" /></a></span>
		<span class="trt1"><a href="admin_izmjena_korisnika.php" style="text-decoration: none"><input type="submit" value="Korisnici" /></a></span></p>
	
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>Broj</th>
			<th>Naslov</th>
			<th>Autor</th>
			<th>Slika</th>
			<th>Kratak Opis</th>
			<th>Cijena</th>
			
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['book_isbn']; ?></td>
			<td><?php echo $row['book_title']; ?></td>
			<td><?php echo $row['book_author']; ?></td>
			<td><?php echo $row['book_image']; ?></td>
			<td><?php echo $row['book_descr']; ?></td>
			<td><?php echo $row['book_price']; ?></td>
			
			<td><a href="admin_izmjeni.php?bookisbn=<?php echo $row['book_isbn']; ?>">Izmjeni</a></td>
			<td><a href="admin_obrisi.php?bookisbn=<?php echo $row['book_isbn']; ?>">Obrisi</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>