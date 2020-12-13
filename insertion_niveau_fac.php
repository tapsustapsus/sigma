<?php
include('commun/connection.php');
include("commun/header.php");
?>

<?php
$num=intval($_POST['num']);
$nidniveau=intval($_POST['id_niveau']);
$nidfac=intval($_POST['id_fac']);


$sql="INSERT INTO Niveaux_Fac
  (id_niveau,id_fac)
   VALUES('$nidniveau','$nidfac')";

  mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn).' requete='.$sql);
  
  echo "Article ajoute avec succee      ";
?>

<?php
include("commun/footer.php");
?>