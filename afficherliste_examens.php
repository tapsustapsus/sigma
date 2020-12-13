<?php
include("commun/header.php");
require_once("commun/connection.php");
?>

<?php
$req="SELECT Examens.id, Examens.examen,Examens.id_fac,Examens.id_certificat,Examens.adate,Fac.nom,Certificats.certificat FROM Examens
LEFT JOIN Certificats ON Examens.id_certificat=Certificats.id
LEFT JOIN Fac ON Examens.id_fac=Fac.id
ORDER BY Examens.id_certificat AND Examens.adate";
$rs=mysqli_query($conn,$req) or die(mysqli_error($conn));
?>

<h2> Liste des Examens</h2>

   <?php $certif='';?>
	<?php while($ET=mysqli_fetch_assoc($rs)){
	
	/* juste pour faire le saut de ligne à chaque chagement de certificat*/
	if($certif!=$ET['id_certificat']){
		
		echo '<hr>';
		echo '<font size=4  color="RED">'. $ET['certificat'].'</font>';
		echo '<hr>';
	}
	
	$certif=$ET['id_certificat'];
	
		 echo "<br>";
		
		 echo 'id :'.$ET['id'].'&nbsp'.'&nbsp'.'&nbsp';
		 echo '   Examen  :'.'<font size="2" color="Green">'.$ET['examen'].'</font>';
		 echo '   id certificat  :'.$ET['id_certificat'].'&nbsp';
		 echo '   FAC:'.$ET['id_Fac'].'&nbsp';
         echo "<br>";	
         echo '   Date:'.$ET['adate'].'&nbsp';
		 echo "<br>";	
		
	 } ?>

	 
	 <h2> Deuxieme type d'affichage</h2>
	 <?php 
	 $res=mysqli_query($conn,$req) or die(mysqli_error($conn));
	        while($ligne=mysqli_fetch_array($res)){
			
			
			echo "<hr>";
			echo "<br>";
			echo '<font size="3" color="Pink">'.'Chapitre: '.'</font>';
			echo '<font size="3" color="Green">'.$ligne['examen'].'</font> <br>';
			echo'id examen :',$ligne['id'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
			
			echo 'certificat :  '.$ligne['id_certificat'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
			echo '<font size="3" color="Red">'.$ligne['certificat'].'</font>'.'&nbsp'.'&nbsp'.'&nbsp';
			echo 'id-Fac: ',$ligne['id_fac'].'-'.$ligne['nom'].'&nbsp'.' --- ';
			echo 'Date: ',$ligne['adate'];
			echo "<br>";
			
			/*ne pas afficher les questions*/
			/*echo("<p class='corps'>$ligne[5]</p>");*/
	       ?>
	        <a href="details_examen.php?num=<?php echo ($ligne['id']);?>">Details Examen</a> &nbsp &nbsp
	       
	        <br>
	        <?php } 
	        ?>
	
<?php
include("commun/footer.php");
?>