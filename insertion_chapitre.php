<?php
include('commun/connection.php');
include("commun/header.php");
?>



   <?php
     $nidcertificat=intval($_POST['id_certificat']);
     $nidspecialite=intval($_POST['id_specialite']);
     $nidspecialite2=intval($_POST['id_specialite2']);
     $nchapitre=$_POST['chapitre'];
    
	 
	  echo $_POST['id_certificat'];
	  echo '<Br>';
	  echo $_POST['id_specialite'];
    echo '<Br>';
    echo $_POST['id_specialite2'];
	  echo '<Br>';
	  echo $_POST['chapitre'];
	 
     
  $sql="INSERT INTO Chapitres
  (id_certificat,id_specialite,chapitre,id_specialite2)
   VALUES('$nidcertificat','$nidspecialite','$nchapitre','$nidspecialite2')";

  mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn).' requete='.$sql);
  
  echo "Article ajoute avec succee      ";
  
 ?>
 
 <?php
include("commun/footer.php");
?>



	  
      