
<?php
include('commun/connection.php');

?>


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

	</head>

	<body>
		
				<div style="width:800px;display:inline-block;" id="conteneur">
			
			     
					 <!-- <form id="formulaire" name="formulaire" method="post" action="index.php">-->
						<div class="titre_centre">
				    		 <select id="choix_certif" name="id_certificat" class="liste" onChange="charger_chapitres()">
					
                         		<option value="">selectionner un certificat</option>
                       			 <?php
                        		 // Appel des certificats
                        		 $req="SELECT id,certificat,id_niveau FROM Certificats ORDER BY certificat";
                         		$rep=mysqli_query($conn,$req);
                         		while ($row = mysqli_fetch_array($rep)){
                          		 // echo "<option value=".$row['id'].">".$row['certificat']."</option>";
                          		  echo "<option value=".$row['id'].">".$row['certificat']."</option>";
                          		}
                        		?>
                     		 </select>
			
					  		  <div id="calque_chapitre" class="liste_div" style="float:right;">
					   		   &nbsp;
					  		   </div>					
							</div>
					     <!--</form>-->
			   				</div>		
							<div class="centre">
							
							</div>					
				
			 	 			</div>
						</div>	
				</div>					
	</body>

<script type="text/javascript" language="javascript">

	function charger_chapitres()
	{
		var tab_chapitres=""; var nb_chapitres=0; var chaine_liste=""; var id_chapitre =0;
		var certif_texte = document.getElementById("choix_certif").value;
		
		//var le_dep = dep_texte.substr(0,2);
		var le_certif = certif_texte; 
		

		if(le_certif!="00")
		{
			
			tab_chapitres = retour_chapitres(le_certif).split('|');
			nb_chapitres = tab_chapitres.length;
			
			
			chaine_liste = "<select id='choix_chapitre' name='id_chapitre' class='liste' >";
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


