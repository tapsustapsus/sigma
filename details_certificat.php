
<?php
  include('commun/connection.php');
  include("commun/header.php");
?>

<form>
<input type="button" value="Annuler" onclick="history.go(-1)">
</form>

     <h2> Details du Certificat</h2>
     <?php
      $id_code=$_GET['num'];
      $id_code=intval($id_code);
      $requete="SELECT id,certificat,id_niveau,nbreheure,id_fac FROM Certificats WHERE id=$id_code";
      $resultats=mysqli_query($conn,$requete);
     ?>



      <?php
       while ($ligne=mysqli_fetch_array($resultats)){
     echo '<p>'.'<font size="6" color="RED">'.$ligne['certificat'].'</font>'.'</p>';
     echo '<p>'.' L\'identificateur :'.$ligne['id'].'</p>';
     echo '<p>'.' La Fac :'.$ligne['id_fac'].'</p>';	
     echo '<p>'.'Le nombre d\'heures :'.$ligne['nbreheure'].'</p>';
     echo '<p>'.'Le Niveau :'.$ligne['id_niveau'].'</p>';	
    		 
     ?>
		 	 
      <a href="supprimer.php?num=<?php echo($ligne['id']);?>">Supprimer</a>
      <a href="modifier_certificat.php?num=<?php echo($ligne['id']);?>">Modifier</a>
		 
	 <?php } ?>
<?php
include("commun/footer.php");
?>