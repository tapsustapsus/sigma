
<?php
  include('commun/connection.php');
  include("commun/header.php");
?>
<form>
<input type="button" value="Annuler" onclick="history.go(-1)">
</form>

     <h2> Details de la Question</h2>
     <?php
      $id_code=$_GET['num'];
      $id_code=intval($id_code);
      $requete="SELECT Questions.id,Questions.id_fac,Questions.id_niveau,Questions.id_chapitre,Questions.id_certificat,Questions.id_examen,
      Questions.type,Questions.correction,Questions.date,Questions.id_tag,question,
      Niveaux.niveau,Certificats.certificat,Chapitres.chapitre FROM Questions 
      LEFT JOIN Niveaux ON Questions.id_niveau=Niveaux.id
      LEFT JOIN Certificats ON Questions.id_certificat=Certificats.id
      LEFT JOIN Chapitres ON Questions.id_chapitre=Chapitres.id
      WHERE Questions.id=$id_code";
      $resultats=mysqli_query($conn,$requete) or die(mysqli_error($conn));
     ?>

   

      <?php
       while ($ligne=mysqli_fetch_array($resultats)){
     echo '<p>'.'<h2>'.$ligne['id'].'</h2>'.'</p>';
     echo '<p>'.' id fac :'.$ligne['id_fac'].'</p>';
     echo '<p>'.'id niveau :'.$ligne['id_niveau'].' '.$ligne['niveau'].'</p>';
     echo '<p>'.'id certificat :'.$ligne['id_certificat'].' '.$ligne['certificat'].'</p>';
     echo '<p>'.' id chapitre :'.$ligne['id_chapitre'].' '.$ligne['chapitre'].'</p>';	
     echo '<p>'.'id examen :'.$ligne['id_examen'].'</p>';	
     echo '<p>'.'type :'.$ligne['type'].'</p>';	
     echo '<p>'.'Correction :'.$ligne['correction'].'</p>';	
     echo '<p>'.'Date :'.$ligne['date'].'</p>';	
     echo '<p>'.'id tag :'.$ligne['id_tag'].'</p>';		
     echo '<p>'.'Question :'.$ligne['question'].'</p>';	
    		 
     ?>
		 	 
      <a href="supprimerquestion.php?num=<?php echo($ligne['id']);?>">Supprimer</a>
      <a href="modifier_question.php?num=<?php echo(intval($ligne['id']));?>">Modifier</a>
		 
	 <?php } ?>
<?php
include("commun/footer.php");
?>