<?php
  session_start();
  $book_isbn = $_GET['bookisbn'];
  // konekcija sa databazom
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Prazna Knjiga";
    exit;
  }

  $title = $row['book_title'];
  require "./template/header.php";
?>
    
      <p class="lead" style="margin: 25px 0"><a href="knjiga.php">Knjiga :</a> > <?php echo $row['book_title']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['book_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Opis Knjige:</h4>
          <p><?php echo $row['book_descr']; ?></p>
         
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "book_descr" || $key == "book_image" || $key == "book_title"){
				  
                continue;
              }
              switch($key){
                case "book_isbn":
                  $key = "BROJ";
                  break;
                case "book_title":
                  $key = "Naziv";
                  break;
                case "book_author":
                  $key = "Autor";
                  break;
                case "book_price":
                  $key = "Cijena";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
			<?php

if(isset($_SESSION["username"])){
?>
          </table>
          <form method="post" action="moja_korpa.php">
            <input type="hidden" name="bookisbn" value="<?php echo $book_isbn;?>">
            <input type="submit" value="Kupi/Ubaci u korpu" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
<?php
}
else {
	?>
          
          </table>
          <form method="post" action="#">
            <input type="hidden" name="bookisbn" value="<?php echo $book_isbn;?>">
            <input type="submit" value="Ako zelite da kupite knjigu morate se Registrovati ili Prijaviti !" name="cart" class="btn btn-primary">
			<p></p>
			<?php echo '<li><a href="prijava.php"><span class="glyphicon glyphicon-login"></span>&nbsp; Prijava / Registracija</a></li>';?>
          </form>
       	</div>
      </div>
       
<?php
}


  require "./template/footer.php";
?>