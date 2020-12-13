<?php
include('commun/connection.php');
include("commun/header.php");
?>


<?php

$id_certif=intval(intval($_GET['num']));
$requete="Select * from Questions where id = $id_certif";
$resultats=mysqli_query($conn,$requete);
?>


<h3> Page formulaire de Modification de la Question</h3>
<h3> Attention il faut choisir le certificat et la specialité à chaque modification</h3>

<hr>
<?php
     WHILE ($ligne=mysqli_fetch_array($resultats)){?>
    <?php  var_dump($ligne['question']);?>
	 
	 <form action="insertion_modification_question.php" method="post">
     
     <textarea name="question"  cols="80%" rows="25"><?php echo ($ligne['question']); ?> </textarea></p>
	
	 <p><label>Le Certificat : </label><input type="INT" name="id_certificat" value="<?php echo ($ligne['id_certificat']); ?>"></p>
	 
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
    
    <select name="id_chapitre" id="chapit">
        <option value=""> selectionner un chapitre</option>
        <?php
        // Appel du chapitre
        $req= "SELECT id, id_certificat, chapitre FROM Chapitres ORDER BY chapitre";
        $rep = mysqli_query($conn,$req);
        var_dump($rep);
        while ($row = mysqli_fetch_array($rep)){
            echo "<option value=".$row['id']." class=".$row['id_certificat'].">".$row['chapitre']."</option>";
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
</br>

<!-- FIN listes derooulantes liées par jquery.............--> 

		<!-- .............................................................................-->	

        <p><label>La fac : </label>
        <input type="INT" name="id_fac" value="<?php echo ($ligne['id_fac']); ?>">
        </p>
	 
     <!-- selection de valeurs sous forme lisqte d'une table ...................-->  
     <?php  
    $getref=mysqli_query($conn,"SELECT id, nom  FROM Fac") or die(mysqli_error($conn)); 
    ?>
    <label>La Fac</label> 
    <select name="id_fac" size="1"> 
       <option value="0">Please Select</option>
       <?php
       while($row = mysqli_fetch_assoc($getref))
       {
       ?>
       <option value = "<?php echo($row['id'])?>" > <?php echo($row['nom']) ?> </option>
       <?php
       }               
       ?>
    </select>
  <hr>
   <!-- .............................................................................-->	

   <p><label>Examen : </label><input type="INT" name="id_examen" value="<?php echo ($ligne['id_examen']); ?>"></p>
	 
    <!-- selection de valeurs sous forme lisqte d'une table ...................-->  
    <?php  
   $getref=mysqli_query($conn,"SELECT id, examen  FROM Examens") or die(mysqli_error($conn)); 
   ?>
   <label>Examen</label> 
   <select name="id_examen" size="1"> 
      <option value="0">Please Select</option>
      <?php
      while($row = mysqli_fetch_assoc($getref))
      {
      ?>
      <option value = "<?php echo($row['id'])?>" > <?php echo($row['examen']) ?> </option>
      <?php
      }               
      ?>
   </select>
 <hr>
  <!-- .............................................................................-->	

<!-- .............................................................................-->	

<p><label>Tag : </label><input type="INT" name="id_tag" value="<?php echo ($ligne['id_tag']); ?>"></p>
	 
    <!-- selection de valeurs sous forme lisqte d'une table ...................-->  
    <?php  
   $getref=mysqli_query($conn,"SELECT id, tag  FROM tags") or die(mysqli_error($conn)); 
   ?>
   <label>Tag</label> 
   <select name="id_tag" size="1"> 
      <option value="0">Please Select</option>
      <?php
      while($row = mysqli_fetch_assoc($getref))
      {
      ?>
      <option value = "<?php echo($row['id'])?>" > <?php echo($row['tag']) ?> </option>
      <?php
      }               
      ?>
   </select>
 <hr>
  <!-- .............................................................................-->	

  <p><label>type : </label><input type="text" size="45" name="type" value="<?php echo ($ligne['type']); ?>"></p>
  <p><label>date : </label><input type="date" size="45" name="date" value="<?php echo ($ligne['date']); ?>"></p>
  <p><label>Correction : </label><input type="text" size="45" name="type" value="<?php echo ($ligne['correction']); ?>"></p>

	 <input type="hidden" value="<?php echo($id_certif);?>" name="num">
	 <input type="submit" value="Mettre à jour">
	 </form>
		 <hr>


		 
     <?php } ?>
     

     <?php
   include("commun/footer.php");
 ?>