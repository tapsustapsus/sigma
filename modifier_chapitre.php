
<?php
include('commun/connection.php');
include("commun/header.php");
?>


<?php
$id_certif=intval($_GET['num']);
$requete="Select * from Chapitres where id =$id_certif";
$resultats=mysqli_query($conn,$requete);
?>


<h3> Page formulaire de Modification d'un Chapitre</h3>
<h3> Attention il faut choisir le certificat et la specialité à chaque modification</h3>

<hr>
<?php
     WHILE ($ligne=mysqli_fetch_array($resultats)){?>
	 
	 <form action="insertion_modification_chapitre.php" method="post">
	 <p><label>Le chapitre : </label><input type="text" size="45" name="chapitre" value="<?php echo ($ligne['chapitre']); ?>"></p>
	 <p><label>Le Certificat : </label><input type="INT" name="id_certificat" value="<?php echo ($ligne['id_certificat']); ?>"></p>
	 
	    <!-- selection de valeurs sous forme lisqte d'une table ...................-->  
		<?php  
	     $getcertif=mysqli_query($conn,"SELECT id, certificat  FROM Certificats") or die(mysqli_error($conn)); 
	     ?>
	     <label>Le Certificat</label>
        <select name="id_certificat" size="1"> 
           <option value="0">Please Select</option>
           <?php
            while($row = mysqli_fetch_assoc($getcertif))
            {
            ?>
            <option value = "<?php echo($row['id'])?>" > <?php echo($row['certificat']) ?> </option>
            <?php
            }               
           ?>
         </select>
	   <hr>
		<!-- .............................................................................-->	
	 
	 <p><label>La Specialité : </label><input type="INT" name="id_specialite" value="<?php echo ($ligne['id_specialite']); ?>"></p>
	 
          <!-- selection de valeurs sous forme lisqte d'une table ...................-->  
		  <?php  
	     $getspec=mysqli_query($conn,"SELECT id, specialite  FROM Specialites") or die(mysqli_error($conn)); 
	     ?>
	     <label>La Spécialité</label> 
         <select name="id_specialite" size="1"> 
            <option value="0">Please Select</option>
            <?php
            while($row = mysqli_fetch_assoc($getspec))
            {
            ?>
            <option value = "<?php echo($row['id'])?>" > <?php echo($row['specialite']) ?> </option>
            <?php
            }               
            ?>
         </select>
	   <hr>
      <!-- .............................................................................-->	
      <!-- .............................................................................-->	
	 
	 <p><label>La Specialité 2 : </label><input type="INT" name="id_specialite2" value="<?php echo ($ligne['id_specialite2']); ?>"></p>
	 
    <!-- selection de valeurs sous forme lisqte d'une table ...................-->  
  <?php  
  $getspec=mysqli_query($conn,"SELECT id, specialite  FROM Specialites") or die(mysqli_error($conn)); 
  ?>
  <label>La Spécialité 2</label> 
   <select name="id_specialite2" size="1"> 
      <option value="0">Please Select</option>
      <?php
      while($row = mysqli_fetch_assoc($getspec))
      {
      ?>
      <option value = "<?php echo($row['id'])?>" > <?php echo($row['specialite']) ?> </option>
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