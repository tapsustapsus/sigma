
<?php
include('commun/connection.php');
include("commun/header.php");
?>

<?php
$num=intval($_POST['num']);
$ncertificat=$_POST['certificat'];
$nfac=intval($_POST['id_fac']);
$nnbreheure=floatval($_POST['nbreheure']);
$nniveau=intval($_POST['id_niveau']);

$ncode=addslashes($ncertificat);

var_dump($ncertificat);
var_dump($num);
var_dump($nnbreheure);
var_dump($nfac);
var_dump($nniveau);

$sql="update Certificats 
set certificat='$ncertificat',
id_fac='$nfac',
nbreheure='$nnbreheure',
id_niveau='$nniveau' where id=$num";

mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn));
?>

<p> modification réalisée avec succé</p>

<?php
include("commun/footer.php");
?>