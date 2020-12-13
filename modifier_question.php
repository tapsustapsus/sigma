
<?php
include('commun/connection.php');
include("commun/header.php");
?>


<?php

$id_question=intval(intval($_GET['num']));

/*$requete="Select * from Questions where id = $id_question";
$resultats=mysqli_query($conn,$requete);*/


$requete="SELECT Questions.id,Questions.id_fac,Questions.id_niveau,Questions.id_chapitre,Questions.id_certificat,Questions.id_examen,
      Questions.type,Questions.correction,Questions.date,Questions.id_tag,question,
      Niveaux.niveau,Certificats.certificat,Chapitres.chapitre FROM Questions 
      LEFT JOIN Niveaux ON Questions.id_niveau=Niveaux.id
      LEFT JOIN Certificats ON Questions.id_certificat=Certificats.id
      LEFT JOIN Chapitres ON Questions.id_chapitre=Chapitres.id
      WHERE Questions.id=$id_question";

      $resultats=mysqli_query($conn,$requete);

      $ligne=mysqli_fetch_array($resultats)
?>







<h3> Page formulaire de Modification de la Question</h3>


<hr>

   
	 
	 <form action="insertion_modification_question.php" method="POST">


          <p><textarea name="question"  cols="80%" rows="25"><?php echo ($ligne['question']); ?> </textarea></p>
           
          <p><?php echo 'id de la question :'.$ligne['id'];?></p>
          <p><?php echo 'Niveau:'.$ligne['id_niveau'].'  '.$ligne['niveau'].'--';?>
          <?php echo '<font color="BLUE">'.'Certificat:'.$ligne['id_certificat'].'  '.$ligne['certificat'].'</font>';?>
          <?php echo '<font color="RED">'.'Chapitre:'.$ligne['id_chapitre'].'  '.$ligne['chapitre'].'</font>';?></p>
	 
	 

		<!-- .............................................................................-->	
         
        <p><label>La fac : </label>
            <input type="INT" name="id_fac" value="<?php echo $ligne['id_fac']; ?>">
       
            <?php 
               $idfac=$ligne['id_fac'];
               $fac=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from Fac WHERE id=$idfac"));
               echo $fac['nom'];
            ?>
        </p>
	 
       <!-- selection de valeurs sous forme lisqte d'une table ...................-->  
       <?php  
       $getref=mysqli_query($conn,"SELECT id, nom  FROM Fac") or die(mysqli_error($conn)); 
       ?>
    <label>La Fac</label> 
    <select name="id_fac" size="1"> 
       <option value="<?php echo $ligne['id_fac'];?>"><?php echo $fac['nom'];?></option>
       <?php
       while($row = mysqli_fetch_assoc($getref)){
       ?>
       <option value = "<?php echo($row['id'])?>" > <?php echo($row['nom']) ?> </option>
       <?php
       }               
       ?>
    </select>
  <hr>
   <!-- .............................................................................-->	

   <p><label>Le certificat déjat saisi : </label>
            <input type="INT" name="id_certificat" value="<?php echo $ligne['id_certificat']; ?>">
       
            <?php 
               $idcertif=$ligne['id_certificat'];
               $fac=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from Certificats WHERE id=$idcertif"));
               echo $fac['certificat'];
            ?>
        </p>

        <p><label>Le chapitre déjat saisi : </label>
            <input type="INT" name="id_chapitre" value="<?php echo $ligne['id_chapitre']; ?>">
       
            <?php 
               $idchapitre=$ligne['id_chapitre'];
               $fac=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from Chapitres WHERE id=$idchapitre"));
               echo $fac['chapitre'];
            ?>
        </p>

   <?php
     include("listes_certif_chapitres.php");
   ?>
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
      while($row = mysqli_fetch_assoc($getref)){
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
      while($row = mysqli_fetch_assoc($getref)){
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

	    <input type="hidden" value="<?php echo($id_question);?>" name="num">
	    <input type="submit" value="Mettre à jour">
	</form>
 
		 <hr>
     
     <?php
   include("commun/footer.php");
 ?>