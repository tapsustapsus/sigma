<?php
include("commun/header.php");
require_once("commun/connection.php");
?>

<?php
$req="SELECT Questions.id, Questions.question,Questions.id_fac,Questions.id_chapitre,Questions.id_certificat,Questions.id_examen,
Questions.type,Questions.correction,Questions.date,Questions.id_tag,certificat,chapitre FROM Questions
LEFT JOIN Certificats ON Questions.id_certificat=Certificats.id
LEFT JOIN Chapitres ON Questions.id_chapitre=Chapitres.id";
$rs=mysqli_query($conn,$req) or die(mysqli_error($conn));
?>

<div id="Gtitre">
<h2> Liste des Questions</h2>
</div>

	 <h2> Deuxieme type d'affichage</h2>
	<?php while($ET=mysqli_fetch_assoc($rs)){
     

		echo "<br>";
		echo 'id :'.$ET['id'].'&nbsp'.' |||||||| ';
		echo '   id certificat  :'.$ET['id_certificat'].'&nbsp'.'<p style="color:RED;">'.$ET['certificat'].'</p>';
		echo '   Le id chapitre :'.$ET['id_chapitre'].'&nbsp'.'<p style="color:RED;">'.$ET['chapitre'].'</p>'.' |||||||| ';
		
		echo     $ET['question'];
		echo "<br>";	


 	?>
	        <a href="details_question.php?num=<?php echo ($ET['id']);?>">Details Question</a>
	       
	<br>
	<hr>
	<?php
	 } 
	?>

<?php
include("commun/footer.php");
?>