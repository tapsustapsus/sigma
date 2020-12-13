<?php

require_once("commun/connection.php");
include("commun/header.php");
?>

<script type="text/javascript" src="verifier_qcm_couleur.js"></script>



<?php
	//$requete = "SELECT DISTINCT liste_ville, liste_dep FROM liste_id ORDER BY liste_dep, liste_ville;";
	$requete = "SELECT DISTINCT chapitres.id, Chapitres.id_certificat, chapitres.chapitre, Certificats.certificat FROM Chapitres
	INNER JOIN Certificats ON Chapitres.id_certificat=Certificats.id;";
	$retours = mysqli_query($conn,$requete);
	// initialisation du fichier tout est efface
	$fichier = fopen("js/chap_certif.js","w");
	fclose($fichier);

	// ouverture du fichier pour ercire
	$fichier = fopen("js/chap_certif.js","w+");
	$chaine ="";$le_certif=""; $chaine_certif="";

    // ecriture de la partie statique dans le fichier cahp_certif
    fwrite($fichier,"function retour_chapitres(le_certif)\r\n");
	fwrite($fichier,"{\r\n\tvar chaine_chapitres='';\r\n");
	fwrite($fichier,"\r\n\tswitch(le_certif)\r\n\t{\r\n");

	// ecriture de la partie dynamique dans le fichier cahp_certif
	while($retour = mysqli_fetch_array($retours))
	{
		if($retour["certificat"]!= $le_certif)
		{
			if($le_certif!="")
			{
				$chaine = rtrim($chaine,"|");
			
				$chaine .= "';\r\n";
				$chaine .= "\t\t\tbreak;\r\n";
			}
			$le_certif = $retour["certificat"];
			$chaine_certif .= $retour["certificat"]."|";
		
			//$chaine .= "\t\tcase'".substr($le_dep,0,2)."':\r\n";
			$chaine .= "\t\tcase'".$retour['id_certificat']."':\r\n";
			$chaine .= "\t\t\tchaine_chapitres='";
			$chaine .= $retour["id"].trim(addslashes($retour["chapitre"]))."|";
		}
		else
		{
				
			$chaine .= $retour["id"].trim(addslashes($retour["chapitre"]))."|";
			
		}
	}
           		 $chaine = rtrim($chaine,"|");
				 $chaine .= "';\r\n";
				 $chaine .= "\t\t\tbreak;\r\n";
		   

			fwrite($fichier,$chaine);

	fwrite($fichier,"\t}\r\n\r\n\treturn chaine_chapitres;\r\n}");
	fclose($fichier);
?>


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html"; charset="utf-8">
		<title>Listes déroulantes en cascade en Javascript</title>
		<meta name="description" content="Listes déroulantes reliées dynamiquement entre elles par le code client Javascript" />
		<meta name="robots" content="index,follow" />
		<meta http-equiv="content-language" content="fr" />
		<!--<link href='styles/mef.css' rel='stylesheet' type='text/css' />-->
		<script type="text/javascript" language="javascript" src="js/chap_certif.js"></script>
		<!--<link rel="stylesheet"   type="text/css" href="mef.css">-->


	</head>

	<body>
	
     

<div id="global">
		<div id="partieG">
				<ul>
					<li> Ligne1  </li>
					<li> Ligne2 </li>
				</ul>
				
		</div>
		<div id="contenu">	

        
				<div style="width:900px;display:inline-block;" id="conteneur">
			
				<form id="formulaire" name="formulaire" method="post" action="afficher_question_chapitre.php">
					
						<div class="titre_centre">
				    		 <select id="choix_certif" name="id_certificat" class="liste" onChange="charger_chapitres()">
					
                         		<option value="">selectionner un certificat</option>
                       			 <?php
                        		 // Appel des certificats
                        		 $req="SELECT id,certificat,id_niveau FROM Certificats ORDER BY certificat";
                         		$rep=mysqli_query($conn,$req);
                         		while ($row = mysqli_fetch_array($rep)){
                          		 
                          		  echo "<option value=".$row['id'].">".$row['certificat']."</option>";
                          		}
                        		?>
                     		 </select>
			
					  		  <div id="calque_chapitre" class="liste_div" style="float:right;">
					   		       &nbsp;
					  		  </div>	


							</div>
					     </form>
			   				
							 <div class="centre">
							
							</div>					
				
			 	 		
						
				</div>	
		

		

			<script type="text/javascript" language="javascript">

				function charger_chapitres()
				{
					var tab_chapitres=""; var nb_chapitres=0; var chaine_liste=""; var id_chapitre =0;
					var certif = document.getElementById("choix_certif").value;
		
					//var le_dep = dep_texte.substr(0,2);
		
					if(certif!="0")
					{
			
						tab_chapitres = retour_chapitres(certif).split('|');
						nb_chapitres = tab_chapitres.length;
			
						chaine_liste = "<select id='choix_chapitre' name='id_chapitre' class='liste' onChange='document.getElementById(\"formulaire\").submit();'>";
			
						chaine_liste += "<option value='Sélection'>Sélectionner un chapitre</option>";	
			
						for(var i=0; i<nb_chapitres; i++)
						{
							id_chapitre = parseInt(tab_chapitres[i]);
							chaine_liste += "<option value='" + id_chapitre + "'>" + tab_chapitres[i] + "</option>";
						}
			
						chaine_liste += "</select>";
			
						document.getElementById("calque_chapitre").innerHTML = chaine_liste;
					}
					else
					alert("Veuillez préciser un certificat");

				}
	
	
			</script>



		<!-- ..........................................................--> 
		<!-- Deuxieme partie ...--> 
		<!-- ..........................................................--> 

 


			<?php
			$numchapitre=intval($_POST['id_chapitre']);

			$getchapitre=mysqli_query($conn,"SELECT chapitre  FROM Chapitres WHERE id = $numchapitre") or die(mysqli_error($conn));
			$row = mysqli_fetch_assoc($getchapitre);

			echo 'Le chapitre choisis  :'. $_POST['id_chapitre'].'&nbsp'.$row['chapitre'];
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
		 <?php while($ET=mysqli_fetch_assoc($rs))
		  {
     

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


        </div>
 </div>
       <div>
		<!-- pied de page -->
		<?php
        include("commun/footer.php");
       ?>
		</div>						
	
