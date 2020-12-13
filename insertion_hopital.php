<?php
include('commun/connection.php');
include("commun/header.php");
?>




   <?php
      $nnom_hopital=$_POST['nom_hopital'];
      
     
       $nnom_hopital=addslashes($nnom_hopital);

     
  

  $sql="INSERT INTO hopitaux
  (nom_hopital)
   VALUES('$nnom_hopital')";

  mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn).' requete='.$sql);
  
  echo "Hopital ajoutés avec succée      ";
  
 ?>




<?php
include("commun/footer.php");
?>



	  
      