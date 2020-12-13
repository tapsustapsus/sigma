
<?php
include('commun/connection.php');
include("commun/header.php");
?>


<h2 style="text-align:center; color:Green;" > Ajout Hopital</h3>
	 
    <form action="insertion_hopital.php" method="post">


        <p><label>L'hopital</label>&nbsp&nbsp
		     <input type="text" name="nom_hopital" size="60"></p>
	    <br><br>

		
	   <hr>
	<br>
	
		 
	        <input type="submit" value="Ajouter">
	 </form>
    
     <!-- les certificats existants existants  ...................-->  
   <?php  
	 $getc=mysqli_query($conn,"SELECT id, nom_hopital  FROM hopitaux") or die(mysqli_error($conn)); 
	  ?>
	  <label>Les hopitaux dejas existants</label>
    <select name="" size="1"> 
    <option value="0">Les hopitaux dejas saisis</option>
        <?php
            while($row = mysqli_fetch_assoc($getc))
            {
            ?>
            <option value = "<?php echo($row['id'])?>" > <?php echo($row['nom_hopital']) ?> </option>
            <?php
            }               
        ?>
    </select>
	   <hr>
		<!-- ........FIN.les certificats existants existants..........................-->
    		
		 
<?php
include("commun/footer.php");
?>