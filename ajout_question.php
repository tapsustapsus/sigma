
<?php
include("commun/header.php");
include('commun/connection.php');
?>

<h2 style="text-align:center"><a href="index.php">Acceuil</a></h2>
<h2 style="text-align:center"> SIGMASCOOL</h2>
<h2 style="text-align:center"> AJOUT DE QUESTION</h3>


	 
    <form action="insertion_question.php" method="post">
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

<?php
include("listes_certif_chapitres.php");
?>

<!-- FIN listes derooulantes liées par jquery.............--> 


<!-- selection de valeurs sous forme lisqte d'une table ...................-->  
      <?php  
	  $getexam=mysqli_query($conn,"SELECT id, examen  FROM Examens") or die(mysqli_error($conn)); 
	  ?>
	  <label>Examen</label>
    <select name="id_examen" size="1"> 
        <option value="0">Please Select</option>
            <?php
            while($row = mysqli_fetch_assoc($getexam))
            {
            ?>
            <option value = "<?php echo($row['id'])?>" > <?php echo($row['examen']) ?> </option>
            <?php
            }               
            ?>
    </select>
	   <hr>
		<!-- .............................................................................-->
		
		<p><label>Selectionner le type</label>
		   <SELECT name="type" size="1"></p>
			<OPTION value="QCM">QCM</option>
			<OPTION value="QROC">QROC</option>
			<OPTION value="Cas Clinique">Cas Clinique</option>
			<OPTION value="Examen">Examen</option>
			<OPTION value="Libre">Libre</option>
		   </SELECT>
	    <br><br>

		<p><label>La correction</label>&nbsp&nbsp
		     <input type="text" name="correction" ></p>
	    <br><br>
	   
<!-- selection de valeurs sous forme lisqte d'une table ...................-->  
      <?php  
	 $gettag=mysqli_query($conn,"SELECT id, tag  FROM Tags") or die(mysqli_error($conn)); 
	  ?>
	  <label>Tag</label>
    <select name="id_tag" size="1"> 
    <option value="0">Please Select</option>
        <?php
            while($row = mysqli_fetch_assoc($gettag))
            {
            ?>
            <option value = "<?php echo($row['id'])?>" > <?php echo($row['tag']) ?> </option>
            <?php
            }               
        ?>
    </select>
	   <hr>
		<!-- .............................................................................-->

		<p><label>La date</label>&nbsp&nbsp
		     <input type="date" name="date" ></p>
	    <br><br>
        
        <p><label>La question </label>&nbsp&nbsp
			<textarea name="question"  cols="50%" rows="5" required="required"> Ajouter la question içi</textarea></p>
	    <br><br><br><br>
	   <hr>
	<br>
		 
	        <input type="submit" value="Ajouter">
	 </form>
	
    		
		 
<?php
include("commun/footer.php");
?>