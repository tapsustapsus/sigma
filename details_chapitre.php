
<?php
include('commun/connection.php');
include("commun/header.php");
?>
<form>
<input type="button" value="Annuler" onclick="history.go(-1)">
</form>

     <h2> Details du Chapitre</h2>
     <?php
      $id_code=$_GET['num'];
      $id_code=intval($id_code);
      $requete="SELECT id,chapitre,id_certificat,id_specialite FROM Chapitres WHERE id=$id_code";
      $resultats=mysqli_query($conn,$requete);
     ?>

     

      <?php
       while ($ligne=mysqli_fetch_array($resultats)){
     echo '<p>'.'<h2>'.$ligne['chapitre'].'</h2>'.'</p>';
     echo '<p>'.' L\'identificateur :'.$ligne['id'].'</p>';
     echo '<p>'.' id certificat :'.$ligne['id_certificat'].'</p>';	
     echo '<p>'.'id specialite :'.$ligne['id_specialite'].'</p>';	
    		 
     ?>
		 	 
      <a href="supprimer.php?num=<?php echo($ligne['id']);?>">Supprimer</a>
      <a href="modifier_chapitre.php?num=<?php echo($ligne['id']);?>">Modifier</a>
		 
	 <?php } ?>
<?php
include("commun/footer.php");
?>