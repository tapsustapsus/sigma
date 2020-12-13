<?php
include("commun/header.php");
require_once("commun/connection.php");
?>

<?php
$req="SELECT Questions.id, Questions.question,Questions.id_fac,Questions.id_chapitre,Questions.id_certificat,Questions.id_examen,
Questions.type,Questions.correction,Questions.date,Questions.id_tag FROM Questions";
$rs=mysqli_query($conn,$req) or die(mysqli_error($conn));
?>

<body>

<h2> Liste des Questions</h2>


	 <h2> Deuxieme type d'affichage</h2>
	 <?php 
	 $res=mysqli_query($conn,$req) or die(mysqli_error($conn));
	        while($ligne=mysqli_fetch_array($res)){
			
			
			echo "<hr>";	
			echo '<font size="1" color="Green">'.$ligne['id'].'</font> <br>';
			echo'<pre>'.$ligne['question'].'</pre>'.'<br>';
			echo 'id chapitre: ',$ligne['id_chapitre'].'<br>';
			echo 'id certificat  '.$ligne['id_certificat'].'<br>';
			
			/*ne pas afficher les questions*/
			/*echo("<p class='corps'>$ligne[5]</p>");*/
	       ?>
	        <a href="details_question.php?num=<?php echo ($ligne['id']);?>">Details Question</a> &nbsp &nbsp
	       
	        <br>
	        <?php } 
	        ?>
	
<?php
include("commun/footer.php");
?>