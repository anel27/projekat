<?php
session_start();
if(isset($_SESSION["admin"])){
header("Location: admin_knjiga.php");
else {
	header("Location: pocetna.php");
}
exit(); }
?>