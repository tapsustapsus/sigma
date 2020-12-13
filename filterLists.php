<?php
 
// Ce script est appelé à chaque sélection d'un élément d'une liste
 
// suivi du critère
$where   = array();
$data    = array();
 
// données sélectionnées => filtres
$jour    = NULL;
$mois    = NULL;
$annee   = NULL;
$ville   = NULL;
$matiere = NULL;
 
/**
 * CE SCRIPT ANALYSE LES SELECTIONS ET RENVOIE DES DONNEES AU FORMAT XML  
 * La structure correspond à ce que jQuery attend pour mettre à jour la page
 * <?xml version="1.0" encoding="utf-8"?>  
 *    <xml>  
 *    <jours></jours>  
 *    <mois></mois>  
 *    <annees></annees>  
 *    <villes></villes>  
 *    <matieres></matieres>  
 *    <table></table>  
 * </xml>  
 *
 * @var SimpleXMLElement
 */
$xml = simplexml_load_string('<?xml version="1.0" encoding="utf-8"?><xml></xml>');
 
// on parcourt le tableau $_POST et on vérifie quelles sont les listes qui ont une sélection
 
// jour
if (isset($_POST['jour']) && (ctype_digit("{$_POST['jour']}"))) {
   $jour = $_POST['jour'];
   $where[] = 'DAY(t_session.date_) = ' . intval($jour);
}
 
//mois
if (isset($_POST['mois']) && (ctype_digit("{$_POST['mois']}"))) {
   $mois = $_POST['mois'];
   $where[] = 'MONTH(t_session.date_) = ' . intval($mois);
}
 
// année
if (isset($_POST['annee']) && (ctype_digit("{$_POST['annee']}"))) {
   $annee = $_POST['annee'];
   $where[] = 'YEAR(t_session.date_) = ' . intval($annee);
}
 
// villes
if (isset($_POST['ville']) && (ctype_digit("{$_POST['ville']}"))) {
   $ville = $_POST['ville'];
   $where[] = 't_session.idVille = ' . intval($ville);
}
 
// matière
if (isset($_POST['matiere']) && (ctype_digit("{$_POST['matiere']}"))) {
   $matiere = $_POST['matiere'];
   $where[] = 't_session_matiere.idMatiere = ' . intval($matiere);
}
 
### FILTRAGE DES DONNÉES DES LISTES (SSI RIEN N'A DÉJÀ ÉTÉ SÉLECTIONNÉ)  
$where = ( ! empty($where)) ? 'WHERE ' . implode(' AND ', $where) : NULL;
 
// ICI MODIFIEZ LE PARAMETRAGE
// Connexion à la base de données
$server = 'localhost';
$user   = 'root';
$pwd    = 'root';
$dbName = 'test';
$cnx    = mysql_connect($server, $user, $pwd);
$db     = mysql_select_db($dbName);
 
 
// on définit le code SQL commun à toutes les requêtes
// voir la chaine SQL d'extraction des données de la table (plus bas)
$fromAndWhere = <<<SQL
t_session_matiere  
   INNER JOIN t_matiere ON t_session_matiere.idMatiere = t_matiere.idMatiere
   INNER JOIN t_session ON t_session_matiere.idSession = t_session.idSession
   INNER JOIN t_ville   ON t_session.idVille           = t_ville.idVille
$where
SQL;
 
/**
 * Crée le code HTML pour les liste relatives aux dates : Jours Mois Années
 * @param mixed $sql
 * @return string
 */
function filtrageDates($sql) {
   $data = array();
   $qry  = mysql_query($sql);
   $data[] = '<option value=""></option>'; // ligne vide
   while($row = mysql_fetch_row($qry)) {
      $data[] = '<option value="' . $row[0] . '">' . $row[0] . '</option>';
   }
   return implode("\n", $data);
}
 
/**
 * Crée le code HTML pour les liste relatives aux villes et matières
 * @param mixed $sql
 * @return string
 */
function filtrageVillesMatieres($sql) {
   $data = array();
   $qry = mysql_query($sql);
   $data[] = '<option value=""></option>'; // ligne vide
   while($row = mysql_fetch_row($qry)) {
      $data[] = '<option value="' . $row[0] . '">' . $row[1] . '</option>';
   }
   return implode("\n", $data);
}
 
// si aucun where -> on repart sur l'extraction de toutes les données possibles (pareil qu'au 1er appel index.php)
$fromDates = (NULL === $where) ? 't_session' : $fromAndWhere;
 
// si le jour n'a pas déjà été sélectionné -> filtrage de la liste
if (NULL === $jour) {
   $sql = "SELECT DISTINCT DAY(t_session.date_) FROM $fromDates ORDER BY DAY(t_session.date_);";
   $xml->addChild('jours', filtrageDates($sql));
}
 
// si le mois n'a pas déjà été sélectionné -> filtrage de la liste
if (NULL === $mois) {
   $sql = "SELECT DISTINCT MONTH(t_session.date_) FROM $fromDates ORDER BY MONTH(t_session.date_);";
   $xml->addChild('mois', filtrageDates($sql));
}
 
// si l'année n'a pas déjà été sélectionnée -> filtrage de la liste
if (NULL === $annee) {
   $sql = "SELECT DISTINCT YEAR(t_session.date_) FROM $fromDates ORDER BY YEAR(t_session.date_);";
   $xml->addChild('annees', filtrageDates($sql));
   $data = array();
}
 
// si la ville n'a pas déjà été sélectionnée -> filtrage de la liste
if (NULL === $ville) {
   // si aucun where -> on repart sur l'extraction de toutes les données possibles (pareil qu'au 1er appel index.php)
   $from = (NULL === $where) ? 't_ville' : $fromAndWhere;
   $sql = "SELECT DISTINCT t_ville.idVille, t_ville.ville FROM $from ORDER BY t_ville.ville;";
   $xml->addChild('villes', filtrageVillesMatieres($sql));  
   $data = array();
}
 
// si la matière n'a pas déjà été sélectionnée -> filtrage de la liste
if (NULL === $matiere) {
   // si aucun where -> on repart sur l'extraction de toutes les données possibles (pareil qu'au 1er appel index.php)
   $from = (NULL === $where) ? 't_matiere' : $fromAndWhere;
   $sql = "SELECT DISTINCT t_matiere.idMatiere, t_matiere.matiere FROM $from ORDER BY t_matiere.matiere;";
   $xml->addChild('matieres', filtrageVillesMatieres($sql));
   $data = array();
}
 
 
// données de la table
$sql = <<<SQL
SELECT  
   t_ville.ville,  
   t_session.date_,  
   t_matiere.matiere,  
   t_session_matiere.nbInscrit  
FROM  
   $fromAndWhere
ORDER BY
   t_ville.ville ASC,  
   t_session.date_ DESC,  
   t_matiere.matiere ASC;
SQL;
 
$data = array();
$qry = mysql_query($sql);
// mise en forme des données
// ici on reconstruit les données de la table
while($row = mysql_fetch_assoc($qry)) {
   $data[] = <<<HTML
<tr>
   <td>{$row['ville']}</td>
   <td class="alignc">{$row['date_']}</td>
   <td>{$row['matiere']}</td>
   <td class="alignr">{$row['nbInscrit']}</td>
</tr>
HTML;
}
 
if (empty($data)) { // pas de données correspondant au filtre
   $data[] = '<tr></tr>';
}
 
$xml->addChild('table', implode("\n", $data)); # noeud attendu par jQuery dans filterLists()
 
 
// Envoi du header et des données
header('content-type: text/xml');
echo $xml->asXML();
 
?>