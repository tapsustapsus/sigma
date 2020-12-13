<?php
include('commun/connection.php');
include("commun/header.php");
?>

<?php
$id_c=intval($_GET['num']);
$requete="SELECT * ,fac.nom FROM users
LEFT JOIN Fac ON users.id_fac=Fac.id WHERE users.id =$id_c";
$resultats=mysqli_query($conn,$requete);
?>

<h3> Page formulaire de Modification des détails user</h3>

<hr>
<?php



     WHILE ($ligne=mysqli_fetch_array($resultats)){?>
	
	 <form action="insertion_modification_details_user.php" method="post">
    <p><label>email: </label><input type="text" name="Nom_user" value="<?php echo ($ligne['nom_user']); ?>"></p>
    <p><label>email: </label><input type="text" name="Prenom" value="<?php echo ($ligne['prenom']); ?>"></p>
	      <p><label>email: </label><input type="text" name="email" value="<?php echo ($ligne['email']); ?>"></p>
	      <p><label>phone  : </label><input type="INT" name="phone" value="<?php echo ($ligne['phone']); ?>"></p>
     
          <p><label>Selectionner le type</label>
		   <SELECT name="qualite" size="1" value="<?php echo ($ligne['qualite']); ?>"></p>
			<OPTION value="Etudiant(e)">Etudiant(e)</option>
			<OPTION value="Médecin">Médecin</option>
            <OPTION value="Prefesseur">Prefesseur</option>
            <OPTION value="Professeur Agrégé">Professeur Agrégé</option>
			<OPTION value="Libre">Libre</option>
		   </SELECT>
	    <br><br>
	 
            <!-- selection de valeurs sous forme liste d'une table ...................--> 
            $reqq


            <!-- selection de valeurs sous forme liste d'une table ...................--> 

	         <!-- selection de valeurs sous forme liste d'une table ...................-->  
            <?php  
	         $getfac=mysqli_query($conn,"SELECT id, nom  FROM Fac") or die(mysqli_error($conn)); 
	         ?>
	         <label>La Fac </label>
             <select name="id_fac" size="1" value="<?php echo($ligne['id_fac']); ?>"> 
                <option value="0"><?php echo($ligne['nom']); ?></option>
                <?php
                 while($row = mysqli_fetch_assoc($getfac))
                 {
                 ?>
			     <option value = "<?php echo($row['id'])?>" > <?php echo($row['id'].$row['nom']) ?> </option>
			
                  <?php
                 }               
                ?>
             </select>
	      <hr>
		  <!-- .............................................................................-->	




        <p><textarea name="observations"  cols="80%" rows="15"  value="<?php echo ($ligne['observations']); ?>"></textarea></p>


        	<!-------             ----> 
          <?php  echo '<img src="data:image/jpeg;base64,' .base64_encode($ligne['images']).'"/>';?>
          <br>
                 <input type="file" name="fic" />
               <!-------             ----> 

              <br>


	 
	       <input type="hidden" value="<?php echo($id_certif);?>" name="num">
	       <input type="submit" value="Mettre à jour">
	    </form>
        <hr>
		 
    <?php } ?>
    
    <?php
   include("commun/footer.php");
 ?>