<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/dizajn.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" />
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="pocetna.php"><span class="glyphicon glyphicon-home"></span>&nbsp;POCETNA</a>
        </div>

        
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		  <li><a href="knjige.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Knjige</a></li>
             
              <li><a href="kontakt.php"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Kontakt</a></li>
              
              <li><a href="moja_korpa.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; Moja Korpa</a></li>
             
			<?php

			
		

			
			
			
if (!empty($_COOKIE["korisnicko_ime"])) {

          echo '<li><a href="odjava.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Odjava</a></li>';
		   echo '<li><a href="izmjeni_podatke.php"><span class="	glyphicon glyphicon-edit"></span>&nbsp; Profil</a></li>';
		    
		 
}
else
{
          echo '<li><a href="prijava.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Prijava</a></li>';

}

?>
		<?php

if(isset($_SESSION['admin']))

          echo '<li><a href="admin_knjiga.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Administracija</a></li>';



 

?>		 
		 
             
            
              
            </ul>
        </div>
      </div>
    </nav>
    <?php
      if(isset($title) && $title == "Index") {
    ?>
 
    <div class="jumbotron">
      <div class="container">
	  <div class="logo2">KNJIGOMANIJA</div>
        <h3>Dobrodosli u Najvecu Online Prodavnicu Knjiga!</h3>
        <p class="lead">Citaj da bi zivio – Gustav Flober</p>
       
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">