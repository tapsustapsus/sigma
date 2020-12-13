
<?php
include('commun/connection.php');
include("commun/header.php");
?>

<h2 style="text-align:center"><a href="index.php">Acceuil</a></h2>
<h2 style="text-align:center"> SIGMASCOOL</h2>
<h2 style="text-align:center"> AJOUT DE CERTIFICAT</h3>
	 
    <form action="insertion_certificat.php" method="post">
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
            <option value = "<?php echo($row['id'])?>" > <?php echo($row['niveau']) ?> </option>
            <?php
            }               
        ?>
    </select>
	   <hr>
		<!-- .............................................................................-->	

        <p><label>Le certificat</label>&nbsp&nbsp
		     <input type="text" name="certificat" size="60"></p>
	    <br><br>


<!-- selection de valeurs sous forme lisqte d'une table ...................-->  
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
            <option value = "<?php echo($row['id'])?>" > <?php echo($row['nom']) ?> </option>
            <?php
            }               
        ?>
    </select>
	   <hr>
		<!-- .............................................................................-->	


        <p><label>Le nombre d'heures</label>&nbsp&nbsp
		     <input type="float" name="nbreheure" ></p>
	    <br><br>
		
	   <hr>
	<br>
	
		 
	        <input type="submit" value="Ajouter">
	 </form>
    
     <!-- les certificats existants existants  ...................-->  
   <?php  
	 $getcertif=mysqli_query($conn,"SELECT id, certificat  FROM Certificats") or die(mysqli_error($conn)); 
	  ?>
	  <label>Les chapitres dejas existants</label>
    <select name="" size="1"> 
    <option value="0">Les certificats dejas saisis</option>
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
		<!-- ........FIN.les certificats existants existants..........................-->
    		
		 
<?php
include("commun/footer.php");
?>