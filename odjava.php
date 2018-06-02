<?php


session_start();
session_destroy();
setcookie("korisnicko_ime", "", time()-360000);
header("Location: pocetna.php"); // Redirecting To Home Page

