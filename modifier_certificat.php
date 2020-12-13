<?php
include('commun/connection.php');
include("commun/header.php");
?>

<?php
$id_certif=intval($_GET['num']);
$requete="Select * from Certificats where id =$id_certif";
$resultats=mysqli_query($conn,$requete);
?>

<h3> Page formulaire de Modification d'un Certificat</h3>
<h3> Attention il faut choisir la fac et le niveau à chaque modification</h3>
<hr>
<?php



     WHILE ($ligne=mysqli_fetch_array($resultats)){?>
	 
	 <form action="insertion_modification_certificat.php" method="post">
	      <p><label>Le certificat : </label><input type="text" name="certificat" value="<?php echo ($ligne['certificat']); ?>"></p>
	      <p><label>ancienne Fac  : </label><input type="INT" name="id_fac" value="<?php echo ($ligne['id_fac']); ?>"></p>
	 
	         <!-- selection de valeurs sous forme liste d'une table ...................-->  
             <?php  
	         $getfac=mysqli_query($conn,"SELECT id, nom  FROM Fac") or die(mysqli_error($conn)); 
	         ?>
	         <label>La Fac </label>
             <select name="id_fac" size="1"> 
                <option value="0">Please Select</option>
                <?php
                 while($row = mysqli_fetch_assoc($getfac))
                 {
                 ?>
			     <option value = "<?php echo($row['id'])?>" > <?php echo($row['id'].$row['nom']) ?> </option>
			
                  <?php
                 }               
                ?>
             </select>
	      <hr>
		  <!-- .............................................................................-->	
	 
	 
	      <p><label>Le nombre d'heure : </label><input type="float" name="nbreheure" value="<?php echo ($ligne['nbreheure']); ?>"></p>
	      <p><label>ancien niveau : </label><input type="INT" name="id_niveau" value="<?php echo ($ligne['id_niveau']); ?>"></p>
	 

             <!-- selection de valeurs sous forme lisqte d'une table ...................-->  
              <?php  
	          $getniv=mysqli_query($conn,"SELECT id, niveau  FROM Niveaux") or die(mysqli_error($conn)); 
	          ?>
	          <label>Le Niveau</label>
              <select name="id_niveau" size="1"> 
	             <option value="0">Please Select</option>
	
                  <?php
                     while($row = mysqli_fetch_assoc($getniv))
                     {
                     ?>
                     <option value = "<?php echo($row['id'])?>" > <?php echo($row['id'].$row['niveau']) ?> </option>
                     <?php
                     }               
                  ?>
               </select>
	           <hr>
	     	   <!-- .............................................................................-->	

	
	       <input type="hidden" value="<?php echo($id_certif);?>" name="num">
	       <input type="submit" value="Mettre à jour">
	    </form>
        <hr>
		 
    <?php } ?>
    
    <?php
   include("commun/footer.php");
 ?>