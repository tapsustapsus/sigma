<?php
  include('commun/connection.php');
  include("commun/header.php");
?>

<form>
<input type="button" value="Annuler" onclick="history.go(-1)">
</form>

     <h2> Details Utilisateur</h2>
     <?php
      $id_code=$_GET['num'];
      $id_code=intval($id_code);
      $requete="SELECT Users.id,Users.nom_user,Users.prenom,
      users.email,users.phone,users.qualite,nom_hopital,users.observations,users.images,Fac.nom
       FROM Users
       LEFT JOIN Fac ON Users.id_fac=Fac.id
       LEFT JOIN hopitaux ON Users.id_hopital=Hopitaux.id
        WHERE Users.id=$id_code";
      $resultats=mysqli_query($conn,$requete) or die(mysqli_error($conn));
     ?>



      <?php
       while ($ligne=mysqli_fetch_array($resultats)){
        echo '<p>'.' L\'identificateur User Table users:'.$ligne['id'].'</p>';	
        
    echo '<img src="data:image/jpeg;base64,' .base64_encode($ligne['images']).'"/>';
     echo '<p>'.'<font size="4" color="RED">'.$ligne['nom_user'].'</font>'.'</p>';
     echo '<p>'.'<font size="4" color="RED">'.$ligne['prenom'].'</font>'.'</p>';
     echo '<p>'.'<font size="4" color="Green">'.$ligne['nom'].'</font>'.'</p>';
     echo '<p>'.'<font size="4" color="RED">'.$ligne['email'].'</font>'.'</p>';
     echo '<p>'.'<font size="4" color="RED">'.$ligne['phone'].'</font>'.'</p>';
     echo '<p>'.'<font size="4" color="RED">'.$ligne['qualite'].'</font>'.'</p>';
     echo '<p>'.'<font size="4" color="RED">'.$ligne['nom_hopital'].'</font>'.'</p>';
     echo '<p>'.'<font size="4" color="RED">'.$ligne['observations'].'</font>'.'</p>';
     	 
     ?>
		 	 
      <a href="supprimer.php?num=<?php echo($ligne['id']);?>">Supprimer</a>
      
      <a href="modifier_details_user.php?num=<?php echo($ligne['id']);?>">Modifier user</a>
		 
	 <?php } ?>
<?php
include("commun/footer.php");
?>