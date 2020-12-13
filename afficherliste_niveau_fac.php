<?php
include("commun/header.php");
require_once("commun/connection.php");
?>

<?php
$req="select Niveaux_fac.id, Niveaux_fac.id_niveau, Niveaux_fac.id_fac, Niveaux.niveau, Fac.nom FROM Niveaux_fac 
INNER JOIN Niveaux ON Niveaux_fac.id_niveau=Niveaux.id
INNER JOIN Fac ON Niveaux_fac.id_fac=Fac.id";
$rs=mysqli_query($conn,$req) or die(mysqli_error($conn));
?>


<h2> Liste des Specialites</h2>


	<?php while($ET=mysqli_fetch_assoc($rs)){


		 echo "<br>";
		 echo 'id :'.$ET['id'].'&nbsp'.'&nbsp';
         echo '   id_niveau :'.'<font size="2" color="Green">'.$ET['id_niveau'].'</font>';
         echo '   <font size="2" color="Green">'.$ET['niveau'].'</font>';
         echo '   id_fac :'.'<font size="2" color="Green">'.$ET['id_fac'].'</font>';
         echo '   <font size="2" color="Green">'.$ET['nom'].'</font>';
		 echo "<br>";	
		
	 } ?>
	 <h2> Deuxieme type d'affichage</h2>
	 <?php 
	 $res=mysqli_query($conn,$req) or die(mysqli_error($conn));
	        while($ligne=mysqli_fetch_array($res)){
			
            
             

                echo "<hr>";
                echo '<font size="3" color="Green">'.$ligne['id_niveau'].'</font> ';
                echo '<font size="3" color="Green">'.$ligne['niveau'].'</font> <br>';
                echo '<font size="3" color="Green">'.$ligne['id_fac'].'</font>'.'&nbsp';
                echo '<font size="3" color="Green">'.$ligne['nom'].'</font> <br>';
                echo  'id niveau_fac :'.$ligne['id'].'&nbsp'.'&nbsp';
                
                echo "<br>";








			
			/*ne pas afficher les questions*/
			/*echo("<p class='corps'>$ligne[5]</p>");*/
	       ?>
	        <a href="details_niveau_fac.php?num=<?php echo ($ligne['id']);?>">Details niveau_fac</a> &nbsp &nbsp
	       
	        <br>
	        <?php } 
	        ?>
	
<?php
include("commun/footer.php");
?>