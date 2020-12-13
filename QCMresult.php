<html> <head> <title>Résultats</title> </head> <!--en-tête HTML classique-->
<body bgColor='#FFFFA4' text='#970000'>
<?     #on passe en PHP
if ($nom =='' | $prenom =='') { #teste si l'on a indiqué son nom et prénom
echo "<br><div align='center'> <H1>Vous devez entrer votre nom et votre prénom !</H1> </div>";
} else { { # si on a indiqué le nom et le prénom affichage du corps de la page
echo "<div align='center'> <H1>Résultats</H1> </div>" ;
echo "<font size='5'>" ; echo "Merci ",$prenom," ",$nom,"<br><br>";
echo "Votre score est de ",$percentage,"<br><br>";
echo "Vous avez mis ",$duree," secondes","<br><br>";
echo "Ces résultats ont bien été transmis";
$date=date("d/m/Y");{ # récupère la date du serveur
$datafile = "resultats.xls"; #fichier enregistrant les résultats au format texte
$filestr = "$date\t$nom\t$prenom\t$exercice\t$percentage\t$duree\n"; #chaîne d'informations avec tabulation à ajouter au fichier de données
if ($fresults = fopen($datafile, "a")) { #ouvre le fichier en écriture et place le pointeur à la fin
fwrite($fresults,$filestr); #écrit les informations dans le fichier resultats.xls
}
else
echo "Fichier de résultats impossible à ouvrir";
fclose($fresults); #referme le fichier resultats.xls
}
?>     #fin du PHP
</font>
</body> </html>