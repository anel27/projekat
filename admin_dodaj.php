<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Dodaj Novu Knjigu";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$isbn = trim($_POST['isbn']);
		$isbn = mysqli_real_escape_string($conn, $isbn);
		
		$title = trim($_POST['title']);
		$title = mysqli_real_escape_string($conn, $title);

		$author = trim($_POST['author']);
		$author = mysqli_real_escape_string($conn, $author);
		
		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($conn, $descr);
		
		$price = floatval(trim($_POST['price']));
		$price = mysqli_real_escape_string($conn, $price);
		
	
		

		// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}

		


		$query = "INSERT INTO books VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $image . "', '" . $descr . "', '" . $price . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_knjiga.php");
		}
	}
?>
	<form method="post" action="admin_dodaj.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>BROJ:</th>
				<td><input type="text" name="isbn"></td>
			</tr>
			<tr>
				<th>Naslov:</th>
				<td><input type="text" name="title" required></td>
			</tr>
			<tr>
				<th>Autor:</th>
				<td><input type="text" name="author" required></td>
			</tr>
			<tr>
				<th>Slika:</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Kratak Opis:</th>
				<td><textarea name="descr" cols="40" rows="5"></textarea></td>
			</tr>
			<tr>
				<th>Cijena:</th>
				<td><input type="text" name="price" required></td>
			</tr>
			
		</table>
		<input type="submit" name="add" value="Dodaj Novu Knjigu" class="btn btn-primary">
		<input type="reset" value="Otkazi" class="btn btn-default">
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>