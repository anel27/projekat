<?php

	require "./template/header.php";
?>
<p class="lead text-success">Uspjesno ste narucili knjige.Molimo provjerite vasu Elektronsku Postu za detalje o preuzimanju.</p>
<?php

	require_once "./template/footer.php";
	session_start();
session_destroy();
?>
