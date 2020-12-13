<?php
include("commun/header.php");
require_once("commun/connection.php");
?>

<?php
$req="select Specialites.id, Specialites.specialite FROM Specialites";
$rs=mysqli_query($conn,$req) or die(mysqli_error($conn));
?>


<h2> Liste des Specialites</h2>


	<?php while($ET=mysqli_fetch_assoc($rs)){


		 echo "<br>";
		
		 echo 'id :'.$ET['id'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
		 echo '   la Specialité  :'.'<font size="3" color="Green">'.$ET['specialite'].'</font>';
	
		 echo "<br>";	
		
	 } ?>
	 <h2> Deuxieme type d'affichage</h2>
	 <?php 
	 $res=mysqli_query($conn,$req) or die(mysqli_error($conn));
	        while($ligne=mysqli_fetch_array($res)){
			
			
			echo "<hr>";
			echo "<br>";
			
			echo '<font size="5" color="Green">'.$ligne['specialite'].'</font> <br>';
			echo'id chap :'.$ligne['id'].'&nbsp'.'&nbsp';
			
			echo "<br>";
			
			/*ne pas afficher les questions*/
			/*echo("<p class='corps'>$ligne[5]</p>");*/
	       ?>
	        <a href="details_specialite.php?num=<?php echo ($ligne['id']);?>">Details Specialité</a> &nbsp &nbsp
	       
	        <br>
	        <?php } 
	        ?>
	
<?php
include("commun/footer.php");
?>