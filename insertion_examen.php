<?php
include('commun/connection.php');
include("commun/header.php");
?>

<h2> Page Insertion Examen</h2>

   <?php
     $nexamen=$_POST['examen'];
     $nidfac=intval($_POST['id_fac']);
     $nidcertificat=intval($_POST['id_certificat']);
     $nadate=$_POST['adate'];
    
      echo $_POST['examen'];
      echo '<Br>';
      echo $_POST['id_fac'];
      echo '<Br>';
	  echo $_POST['id_certificat'];
	  echo '<Br>';
	  echo $_POST['adate'];
	 
     
  $sql="INSERT INTO Examens
  (examen,id_fac,id_certificat,adate)
   VALUES('$nexamen','$nidfac','$nidcertificat','$nadate')";

  mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn).' requete='.$sql);
  
  echo "Article ajoute avec succee      ";
  
 ?>
 
 <?php
include("commun/footer.php");
?>



	  
      