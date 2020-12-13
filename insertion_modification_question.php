<?php
include('commun/connection.php');
include("commun/header.php");
?>

<?php
$num=intval($_POST['num']);
$nidfac=intval($_POST['id_fac']);
$nidniveau=intval($_POST['id_niveau']);
$nidchapitre=intval($_POST['id_chapitre']);
$nidcertificat=intval($_POST['id_certificat']);
$nidexamen=intval($_POST['id_examen']);
$ntype=$_POST['type'];
$ncorrection=$_POST['correction'];
$ndate=$_POST['date'];
$nidtag=intval($_POST['id_tag']);
$nquestion=$_POST['question'];



$nquestion=addslashes($nquestion);


var_dump($num,$nidcertificat);


$sql="UPDATE Questions 
SET id_fac='$nidfac',
id_niveau='$nidniveau',
id_chapitre='$nidchapitre',
id_certificat='$nidcertificat',
id_examen='$nidexamen',
type='$ntype',
correction='$ncorrection',
date='$ndate',
id_tag='$nidtag',
question='$nquestion'
 WHERE id = $num ";


mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn));
?>

<p> modification réalisée avec succé</p>

<?php
include("commun/footer.php");
?>