<?php
include('commun/connection.php');
include("commun/header.php");
?>

<?php
$num=intval($_POST['num']);
$nchapitre=$_POST['chapitre'];
$ncertif=intval($_POST['id_certificat']);

$nspecialite=intval($_POST['id_specialite']);
$nspecialite2=intval($_POST['id_specialite2']);

$ncode=addslashes($nchapitre);



$sql="update Chapitres 
set chapitre='$nchapitre',
id_certificat='$ncertif',
id_specialite='$nspecialite',
id_specialite2='$nspecialite2'
 where id=$num";

mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn));
?>

<p> modification réalisée avec succé</p>

<?php
include("commun/footer.php");
?>