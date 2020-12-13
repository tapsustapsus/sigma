
<?php
include('commun/connection.php');
include("commun/header.php");
?>


<h2 style="text-align:center"><a href="index.php">Acceuil</a></h2>
<h2 style="text-align:center"> SIGMASCOOL</h2>
<h2 style="text-align:center"> AJOUT CHAPITRES</h3>
	 
    <form action="insertion_chapitre.php" method="post">
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
        <!-- selection de valeurs sous forme lisqte d'une table ...................-->  
<?php  
	 $getspec=mysqli_query($conn,"SELECT id, specialite  FROM Specialites") or die(mysqli_error($conn)); 
	  ?>
	 <label>La Spécialité 2 </label> 
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
        <p><label>Le Chapitre</label>&nbsp&nbsp
		     <input type="text" name="chapitre" size='70' ></p>
	    <br><br>

          <!-- .............................................................................-->

	   <hr>
	<br>
	        <input type="submit" value="Ajouter">
	 </form>
     <hr>
    
   <!-- le chapitres existants  ...................-->  
   <?php  
	 $getchapit=mysqli_query($conn,"SELECT Chapitres.id, chapitre, id_certificat,Certificats.certificat  FROM Chapitres
     LEFT JOIN Certificats ON Chapitres.id_certificat=Certificats.id ORDER BY id_certificat") or die(mysqli_error($conn)); 
	  ?>
	  <label>Les chapitres dejas existants</label>
    <select name="" size="1"> 
    <option value="0">Chapitres dejas saisis</option>
        <?php
            while($row = mysqli_fetch_assoc($getchapit))
            {
            ?>
            <option value = "<?php echo($row['id'])?>" > <?php echo($row['id_certificat'].' '.$row['certificat'].$row['chapitre']) ?> </option>
            <?php
            }               
        ?>
    </select>
	   <hr>
		<!-- .............................................................................-->	
    		
		 
<?php
include("commun/footer.php");
?>