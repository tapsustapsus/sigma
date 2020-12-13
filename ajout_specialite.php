
<?php
include('commun/connection.php');
include("commun/header.php");
?>


<h2 style="text-align:center"><a href="index.php">Acceuil</a></h2>
<h2 style="text-align:center"> SIGMASCOOL</h2>
<h2 style="text-align:center"> AJOUT DE SPECIALITE</h3>
	 
    <form action="insertion_specialite.php" method="post">


        <p><label>La Spécalité</label>&nbsp&nbsp
		     <input type="text" name="specialite" ></p>
	    <br><br>
		
	<br>
	        <input type="submit" value="Ajouter">
	 </form>

     <hr>
     <p> les specialiés dejas existantes </p>
	
    		<!-- selection de valeurs sous forme lisqte d'une table ...................-->  
            <?php  
	 $getspec=mysqli_query($conn,"SELECT id, specialite  FROM Specialites") or die(mysqli_error($conn)); 
	  ?>
	  
    <select name="" size="1"> 
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

		

<?php
include("commun/footer.php");
?>