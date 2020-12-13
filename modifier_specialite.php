<?php
include('commun/connection.php');
include("commun/header.php");
?>


<?php

$id_certif=intval($_GET['num']);
$requete="Select * from Specialites where id =$id_certif";
$resultats=mysqli_query($conn,$requete);
?>


<h3> Page formulaire de Modification d'une spécialité</h3>

<hr>
<?php
     WHILE ($ligne=mysqli_fetch_array($resultats)){?>
	 
	 <form action="insertion_modification_specialite.php" method="post">
	 <p><label>La Specialité : </label><input type="text" size="45" name="specialite" value="<?php echo ($ligne['specialite']); ?>"></p>
	 <input type="hidden" value="<?php echo($id_certif);?>" name="num">
	 <input type="submit" value="Mettre à jour">
	 </form>
		 <hr>


		 
	 <?php } ?>


	 <?php
   include("commun/footer.php");
 ?>