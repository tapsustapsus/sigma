
<?php
  include('commun/connection.php');
  include("commun/header.php");
?>
<form>
<input type="button" value="Annuler" onclick="history.go(-1)">
</form>

     <h2> Details de la specialité</h2>
     <?php
      $id_code=$_GET['num'];
      $id_code=intval($id_code);
      $requete="SELECT id,specialite FROM Specialites WHERE id=$id_code";
      $resultats=mysqli_query($conn,$requete);
     ?>

      

      <?php
       while ($ligne=mysqli_fetch_array($resultats)){
     echo '<p>'.'<h2>'.$ligne['specialite'].'</h2>'.'</p>';
     echo '<p>'.' L\'identificateur :'.$ligne['id'].'</p>';
   	
    		 
     ?>
		 	 
      <a href="supprimer.php?num=<?php echo($ligne['id']);?>">Supprimer</a>
      <a href="modifier_specialite.php?num=<?php echo($ligne['id']);?>">Modifier</a>
		 
	 <?php } ?>
<?php
include("commun/footer.php");
?>