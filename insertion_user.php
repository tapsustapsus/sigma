<?php
include('commun/connection.php');
include("commun/header.php");
?>




   <?php
      $nnom_user=$_POST['nom_user'];
      $nprenom=$_POST['prenom'];
     $nidfac=intval($_POST['id_fac']);
     $nidchapitre=intval($_POST['id_chapitre']);
     $nemail=$_POST['email'];
     $nphone=intval($_POST['phone']);
     $nqualite=$_POST['qualite'];
     $nobservations=$_POST['observations'];
     $nidhopital=intval($_POST['id_hopital']);
     
       $nobservations=addslashes($nobservations);

       $images = file_get_contents($_FILES['fic']['tmp_name']);
       $images=addslashes($images);
  

  $sql="INSERT INTO Users
  (nom_user,prenom,id_fac,id_chapitre,email,phone,id_hopital,qualite,observations,images)
   VALUES('$nnom_user','$nprenom','$nidfac','$nidchapitre','$nemail','$nphone','$nidhopital','$nqualite','$nobservations','$images')";

  mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn).' requete='.$sql);
  
  echo "Details User ajoutés avec succée      ";
  
 ?>




<?php
include("commun/footer.php");
?>



	  
      