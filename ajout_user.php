<?php
include("commun/header.php");
include('commun/connection.php');
?>
<center>
<h3><font size="4" color="Green"> Ajout d'un utilisateur </font></h3>
</center>

    <form enctype="multipart/form-data" action="insertion_user.php" method="post">

    <p><label>Nom</label>&nbsp&nbsp
		     <input type="text" name="nom_user" ></p>

        <p><label>Prenom</label>&nbsp&nbsp
		     <input type="text" name="prenom" ></p>

		
		<p><label>Selectionner la qualité</label>
		   <SELECT name="qualite" size="1"></p>
			<OPTION value="Etudiant(e)">Etudiant(e)</option>
			<OPTION value="Médecin">Médecin</option>
            <OPTION value="Prefesseur">Prefesseur</option>
            <OPTION value="Professeur Agrégé">Professeur Agrégé</option>
			<OPTION value="Libre">Libre</option>
			
		   </SELECT>


		<p><label>Email</label>&nbsp&nbsp
		     <input type="text" name="email" ></p>
	    
        <p><label> Phone</label>&nbsp&nbsp
		     <input type="INT" name="phone" ></p>
	    
        <p><label>L'hopital</label>
		
		<?php
		$requ="SELECT * FROM Hopitaux ORDER BY nom_hopital";
		$res=mysqli_query($conn,$requ) or die(mysqli_error($conn));
		?>
		<select name="id">
		<?php
		while($ligne=mysqli_fetch_array($res)){?>
		    <option value="0">Selectionner hopital</option>
			<option value="<?php echo $ligne['id'];?>"><?php echo $ligne['nom_hopital'];?></option>
		<?php }
		?>
        </select>
        <p><label>Observations </label>&nbsp&nbsp
			<textarea name="observations"  cols="50%" rows="5" > Ajouter les observations içi</textarea></p>
	    <br><br><br><br>
	   <hr>
		<!-------             ----> 
        <p> Choisir l'image de l'utilisateur </p>
    <input type="file" name="fic" />
<!-------             ----> 
        <br><br><hr>
	        <input type="submit" value="Ajouter le User">
	 </form>


    		
		 
<?php
include("commun/footer.php");
?>