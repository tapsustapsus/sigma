
<?php
include("commun/header.php");
require_once("commun/connection.php");
?>

<?php
$req="SELECT users.id,users.images,users.nom_user,users.prenom,users.email,users.phone,users.qualite,users.observations FROM Users";
$rs=mysqli_query($conn,$req) or die(mysqli_error($conn));
?>

<h2> Liste Users</h2>


	<?php while($ET=mysqli_fetch_assoc($rs)){

		 echo "<br>";
		 echo  $ET['id'].'&nbsp'. $ET['prenom'].'&nbsp';
		 echo   '<font face="arial" size="3" color="red">'.$ET['nom_user'].'&nbsp'.'</font>';
	
		 echo   '<font face="arial" size="3" color="red">'.$ET['qualite'].'</font>';
		 echo "<br>";	
		
	 } ?>

	 <h2> Deuxieme type d'affichage</h2>
	 <?php 
	 $res=mysqli_query($conn,$req) or die(mysqli_error($conn));
	        while($ligne=mysqli_fetch_array($res)){
			
			
			echo "<hr>";
			echo "<br>";
			echo '<p><img src="data:image/jpeg;base64,' .base64_encode($ligne['images']).'" width="80" height="70"/></p>';
			echo '<font face="arial" size="3" color="red">'.$ligne['nom_user'].'</font>'. '&nbsp';
			
			echo '<font face="arial" size="4" color="red">'. $ligne['prenom'].'&nbsp'.'</font>'.'<br>';
			echo'Details Certificat :',$ligne['id'].'&nbsp'.'&nbsp';
			echo "<br>";
			
			/*ne pas afficher les questions*/
			/*echo("<p class='corps'>$ligne[5]</p>");*/
	       ?>
	        <a href="details_user.php?num=<?php echo ($ligne['id']);?>">Details Utilisateur</a> &nbsp &nbsp

	       
	        <br>
	        <?php } 
	        ?>
	
<?php
include("commun/footer.php");
?>