<?php
include("commun/header.php");
require_once("commun/connection.php");
?>

<?php
$req="select Chapitres.id, Chapitres.chapitre,Chapitres.id_certificat,Certificats.certificat,Chapitres.id_specialite,
Specialites.specialite, Chapitres.id_specialite2 FROM Chapitres
INNER JOIN Certificats ON Chapitres.id_certificat=Certificats.id
LEFT JOIN Specialites ON Chapitres.id_specialite=Specialites.id
ORDER BY Certificats.id";
$rs=mysqli_query($conn,$req) or die(mysqli_error($conn));
?>

<h2> Liste des Chapitres</h2>

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
		 echo '   le chapitre  :'.'<font size="2" color="Green">'.$ET['chapitre'].'</font>';
		 echo '   id certificat  :'.$ET['id_certificat'].'&nbsp';
		 echo '   Le id specialité :'.$ET['id_specialite'].'&nbsp';
		 echo "<br>";	
		
	 } ?>

	 
	 <h2> Deuxieme type d'affichage</h2>
	 <?php 
	 $res=mysqli_query($conn,$req) or die(mysqli_error($conn));
	        while($ligne=mysqli_fetch_array($res)){
			
			
			echo "<hr>";
			echo "<br>";
			echo '<font size="3" color="Pink">'.'Chapitre: '.'</font>';
			echo '<font size="3" color="Green">'.$ligne['chapitre'].'</font> <br>';
			echo'id du chapitre :',$ligne['id'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
			
			echo 'certificat :  '.$ligne['id_certificat'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
			echo '<font size="3" color="Red">'.$ligne['certificat'].'</font>'.'&nbsp'.'&nbsp'.'&nbsp';
			echo 'id-specialité: ',$ligne['id_specialite'].'-'.$ligne['specialite'].'&nbsp'.' --- ';
			echo 'id-specialité2: ',$ligne['id_specialite2'];
			echo "<br>";
			
			/*ne pas afficher les questions*/
			/*echo("<p class='corps'>$ligne[5]</p>");*/
	       ?>
	        <a href="details_chapitre.php?num=<?php echo ($ligne['id']);?>">Details Chapitre</a> &nbsp &nbsp
	       
	        <br>
	        <?php } 
	        ?>
	
<?php
include("commun/footer.php");
?>