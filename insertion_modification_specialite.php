<?php
include('commun/connection.php');
include("commun/header.php");
?>

<?php
$num=intval($_POST['num']);
$nspecialite=$_POST['specialite'];

$ncode=addslashes($nspecialite);

$sql="update Specialites
set specialite='$nspecialite' where id=$num";

mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn));
?>

<p> modification réalisée avec succé</p>

<?php
include("commun/footer.php");
?>