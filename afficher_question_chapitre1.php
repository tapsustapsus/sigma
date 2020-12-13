<?php
include("commun/header.php");
require_once("commun/connection.php");
?>


 
<form action="afficher_question_chapitre.php" method="post">
<!-- selection d...................-->  
      <?php  
	 $getcertif=mysqli_query($conn,"SELECT id, certificat, id_niveau  FROM Certificats") or die(mysqli_error($conn)); 
	  ?>
	     <label>Le certificat</label>
        <select name="numcertif" size="1" > 
          <option value="0">Please Select</option>
           <?php
            while($row = mysqli_fetch_assoc($getcertif))
            {
            ?>
            <option value = "<?php echo($row['id'])?>"> <?php echo($row['id']).'&nbsp'?><?php echo($row['certificat']) ?><?php echo '&nbsp'.($row['id_niveau']) ?> </option>
            <?php
            }               
           ?>
        </select>
	   <hr>
        
	 
       <input type="submit" value="Choisir certificat">
	 </form>
	
     <?php
$numcertif=intval($_POST['numcertif']);
echo 'Le certif choisis  :'. $_POST['numcertif'];
     ?>
     <hr>

<!-- selection d...................-->  
<form action="afficher_question_chapitre.php" method="post">
<?php  
	 $getchapitre=mysqli_query($conn,"SELECT id, chapitre, id_certificat  FROM Chapitres WHERE id_certificat = $numcertif") or die(mysqli_error($conn)); 
	  ?>
	     <label>Le certificat</label>
        <select name="numchapitre" size="1"> 
          <option value="0">Please Select</option>
           <?php
            while($row = mysqli_fetch_assoc($getchapitre))
            {
            ?>
            <option value = "<?php echo($row['id'])?>"> <?php echo($row['id']).'&nbsp'?><?php echo($row['chapitre']) ?><?php echo '&nbsp'.($row['id_niveau']) ?> </option>
           <?php
            }               
           ?>
              
        </select>
	   <hr>
        
	 
       <input type="submit" value="Choisir chapitre">
	 </form>
	
     <?php
$numchapitre=intval($_POST['numchapitre']);

$getchapitre=mysqli_query($conn,"SELECT chapitre  FROM Chapitres WHERE id = $numchapitre") or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($getchapitre);

echo 'Le chapitre choisis  :'. $_POST['numchapitre'].'&nbsp'.$row['chapitre'];
     ?>

     <hr>


<!-- selection d...................-->  


<?php
$req="SELECT Questions.id, Questions.question,Questions.id_fac,Questions.id_chapitre,Questions.id_certificat,Questions.id_examen,
Questions.type,Questions.correction,Questions.date,Questions.id_tag FROM Questions
WHERE Questions.id_chapitre=$numchapitre";
$rs=mysqli_query($conn,$req) or die(mysqli_error($conn));
?>


	 <h2> Deuxieme type d'affichage</h2>
	 <?php while($ET=mysqli_fetch_assoc($rs)){
     

echo "<br>";

echo 'id :'.$ET['id'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
echo '   la Question :'.'<font size="2" color="Green">'.$ET['question'].'</font>';
echo '   Le id chapitre :'.$ET['id_chapitre'].'&nbsp';
echo '   id certificat  :'.$ET['id_certificat'].'&nbsp';

echo "<br>";	


 ?>
	        <a href="details_question.php?num=<?php echo ($ET['id']);?>">Details Question</a> &nbsp &nbsp
	       
			<br>
			<hr>
			<?php
			 } 
	        ?>

<?php
include("commun/footer.php");
?>