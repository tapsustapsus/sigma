<?php
include('commun/connection.php');
include("commun/header.php");
?>
   
   <?php
     $nspecialite=$_POST['specialite'];
     
	 
	  echo $_POST['specialite'];
	  echo '<Br>';
	
     
  $sql="INSERT INTO Specialites
  (specialite)
   VALUES('$nspecialite')";

  mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn).' requete='.$sql);
  
  echo "Article ajoute avec succee      ";
  
 ?>
 
 <?php
include("commun/footer.php");
?>


	  
      