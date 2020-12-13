<?php
include('commun/connection.php');
include("commun/header.php");
?>


<h2 style="text-align:center"><a href="index.php">Acceuil</a></h2>
<h2 style="text-align:center"> SIGMASCOOL</h2>
<h2 style="text-align:center"> AJOUT Niveau-Fac</h3>
	 
    <form action="insertion_niveau_fac.php" method="post">
<!-- selection de valeurs sous forme lisqte d'une table ...................-->  
      <?php  
	 $getniveau=mysqli_query($conn,"SELECT id, niveau  FROM Niveaux") or die(mysqli_error($conn)); 
	  ?>
	  <label>Le Niveau</label>
    <select name="id_niveau" size="1"> 
    <option value="0">Please Select</option>
        <?php
            while($row = mysqli_fetch_assoc($getniveau))
            {
            ?>
            <option value = "<?php echo($row['id'])?>" > <?php echo($row['niveau']) ?> </option>
            <?php
            }               
        ?>
    </select>
	   <hr>
		<!-- .............................................................................-->	



<!-- selection de valeurs sous forme lisqte d'une table ...................-->  
<?php  
	 $getfac=mysqli_query($conn,"SELECT id, nom  FROM Fac") or die(mysqli_error($conn)); 
	  ?>
	 <label>La Fac</label> 
    <select name="id_fac" size="1"> 
    <option value="0">Please Select</option>
        <?php
            while($row = mysqli_fetch_assoc($getfac))
            {
            ?>
            <option value = "<?php echo($row['id'])?>" > <?php echo($row['nom']) ?> </option>
            <?php
            }               
        ?>
    </select>
	   <hr>
        <!-- .............................................................................-->	
    
	<br>	 
	        <input type="submit" value="Ajouter">
	 </form>


     <hr>
   
    		
		 
<?php
include("commun/footer.php");
?>