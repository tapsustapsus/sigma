<?php
include('commun/connection.php');
include("commun/header.php");
?>


<h3> Page suppression de la Question</h3>

<?php
$id_question=intval(intval($_GET['num']));

$requete="DELETE FROM Questions where id = $id_question";
$resultats=mysqli_query($conn,$requete) or die (mysqli_error($conn)) ;

echo "Article supprimé";
?>


<hr>

     
     <?php
   include("commun/footer.php");
 ?>