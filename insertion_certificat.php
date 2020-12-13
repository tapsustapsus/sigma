<?php
include('commun/connection.php');
include("commun/header.php");
?>



   <?php
     
     $nidniveau=intval($_POST['id_niveau']);
     $ncertificat=$_POST['certificat'];
     $nbreheure=intval($_POST['nbreheure']);
     $nidfac=intval($_POST['id_fac']);
     
	   $ncertificat=addslashes($ncertificat);
	 
	  echo $_POST['id_niveau'];
	  echo '<Br>';
	  echo $_POST['certificat'];
	  echo '<Br>';
	  echo $_POST['nbreheure'];
	  echo '<Br>';
	  echo $_POST['id_fac'];
	  echo '<Br>';

     
  $sql="INSERT INTO Certificats
  (id_niveau,certificat,nbreheure,id_fac)
   VALUES('$nidniveau','$ncertificat','$nbreheure','$nidfac')";

  mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn).' requete='.$sql);
  
  echo "Article ajoute avec succee      ";
  
 ?>
 
<?php
include("commun/footer.php");
?>



	  
      