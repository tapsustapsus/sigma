
<?php
include('commun/connection.php');
include("commun/header.php");
?>
   
   <?php
	 $nidfac=intval($_POST['id_fac']);
	 $nidniveau=intval($_POST['id_niveau']);
     $nidchapitre=intval($_POST['id_chapitre']);
     $nidcertificat=intval($_POST['id_certificat']);
     $nidexamen=intval($_POST['id_examen']);
     $ntype=$_POST['type'];
     $ncorrection=$_POST['correction'];
     $ndate=$_POST['date'];
     $nidtag=intval($_POST['id_tag']);
     $nquestion=$_POST['question'];
	 
	 $nquestion=addslashes($nquestion);
	 
	  echo $_POST['id_fac'];
	  echo '<Br>';
	  echo $_POST['id_niveau'];
	  echo '<Br>';
	  echo $_POST['id_chapitre'];
	  echo '<Br>';
	 echo $_POST['id_certificat'];
	 echo '<Br>';
	  echo $_POST['id_examen'];
	  echo '<Br>';
	 echo $_POST['type'];
	  echo '<Br>';
	 echo $_POST['correction'];
	  echo '<Br>';
	 echo $_POST['date'];
	  echo '<Br>';
	 echo $_POST['id_tag'];
	  echo '<Br>';
	 echo $_POST['question'];
	  echo '<Br>';


  $sql="INSERT INTO  questions (id_fac,id_niveau,id_chapitre,id_certificat,id_examen,type,correction,date,id_tag,question)
   values('$nidfac','$nidniveau','$nidchapitre','$nidcertificat','$nidexamen','$ntype','$ncorrection','$ndate','$nidtag','$nquestion')";

  mysqli_query($conn,$sql) or die('Erreur : '.mysqli_error($conn).' requete='.$sql);
  
  echo "Article ajoute avec succee      ";

  
  
 ?>
 
 <?php
   include("commun/footer.php");
 ?>