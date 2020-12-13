
<?php
include("commun/header.php");
require_once("commun/connection.php");
?>

<?php
$req="select Certificats.id, Certificats.certificat,Certificats.nbreheure,Fac.nom,Niveaux.niveau from Certificats 
INNER JOIN Niveaux ON Certificats.id_niveau=Niveaux.id
INNER JOIN Fac ON Certificats.id_fac=Fac.id";
$rs=mysqli_query($conn,$req) or die(mysqli_error($conn));
?>

<h2> Liste des Certificats</h2>


	<?php while($ET=mysqli_fetch_assoc($rs)){

		 echo "<br>";
		 echo  $ET['id'].'&nbsp'. $ET['niveau'].'&nbsp';
		 echo   '<font face="arial" size="3" color="red">'.$ET['certificat'].'</font>';
		 echo  '&nbsp'.'&nbsp' . $ET['nbreheure'].'H';
		 echo   '&nbsp'.'&nbsp' .$ET['nom'];
		 echo "<br>";	
		
	 } ?>

	 <h2> Deuxieme type d'affichage</h2>
	 <?php 
	 $res=mysqli_query($conn,$req) or die(mysqli_error($conn));
	        while($ligne=mysqli_fetch_array($res)){
			
			
			echo "<hr>";
			echo "<br>";
			
			echo '<font face="arial" size="3" color="red">'.$ligne['certificat'].'</font>'. '<br>';
			echo'Details Certificat :',$ligne['id'].'&nbsp'.'&nbsp';
			echo '<font face="arial" size="4" color="red">'. $ligne['niveau'].'&nbsp'.'</font>';
			echo $ligne['nbreheure'].'H'.'&nbsp'.'&nbsp';
			echo $ligne['nom'].'&nbsp'.'&nbsp';
			echo "<br>";
			
			/*ne pas afficher les questions*/
			/*echo("<p class='corps'>$ligne[5]</p>");*/
	       ?>
	        <a href="details_certificat.php?num=<?php echo ($ligne['id']);?>">Details Code</a> &nbsp &nbsp
	       
	        <br>
	        <?php } 
	        ?>
	
<?php
include("commun/footer.php");
?>