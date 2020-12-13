
<?php
include("commun/header.php");
include('commun/connection.php');
?>

<h2 style="text-align:center"><a href="index.php">Acceuil</a></h2>
<h2 style="text-align:center"> SIGMASCOOL</h2>
<h2 style="text-align:center"> AJOUT D'EXAMENS</h3>


	 
    <form action="insertion_examen.php" method="post">
<!-- selection de la fac ...................-->  
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
		

<!-- listes derooulantes liées par jquery.............--> 


<select name="id_niveau" id="niveau">
        <option value="">selectionner un niveau</option>
        <?php
        // Appel des niveaux
        $req="SELECT id,niveau FROM Niveaux ORDER BY niveau";
        $rep=mysqli_query($conn,$req);
        while ($row = mysqli_fetch_array($rep)){
            echo "<option value=".$row['id'].">".$row['niveau']."</option>";
        }
        ?>
        </select>


    <select name="id_certificat" id="certif">
        <option value="">selectionner un certificat</option>
        <?php
        // Appel des certificats
        $req="SELECT id,certificat,id_niveau FROM Certificats ORDER BY certificat";
        $rep=mysqli_query($conn,$req);
        while ($row = mysqli_fetch_array($rep)){
           // echo "<option value=".$row['id'].">".$row['certificat']."</option>";
           echo "<option value=".$row['id']." class=".$row['id_niveau'].">".$row['certificat']."</option>";
        }
        ?>
        </select>


<script type="text/javascript">$(function(){
    //$("#chapit").chained("#certif");
    $("#chapit").chained("#certif");
    $("#certif").chained("#niveau");

});
</script>

</br>
<hr>

<!-- FIN listes derooulantes liées par jquery.............--> 
	
<p><label>L'examen</label>&nbsp&nbsp
		     <input type="text" name="examen" size='70' ></p>
	   <br>
	   <hr>
		<p><label>La date</label>
		     <input type="date" name="adate" ></p>
	    <br>
	   <hr>
	   <br>
		 
	        <input type="submit" value="Ajouter">
	 </form>
	
    		
		 
<?php
include("commun/footer.php");
?>