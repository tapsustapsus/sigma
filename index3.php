<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
   <meta http-equiv="Cache-Control" content="no-cache">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Listes liées</title>
   <link rel="stylesheet" type="text/css" href="my.css">
   <script type="application/javascript" charset="utf-8" src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
   <script type="application/javascript">
      function filterLists() {
         // ici on récupère les valeurs sélectionnées pour chaque liste avec les sélecteurs de jQuery
         var jour    = $('#jours option:selected').val();
         var mois    = $('#mois option:selected').val();
         var annee   = $('#annees option:selected').val();
         var ville   = $('#villes option:selected').val();
         var matiere = $('#matieres option:selected').val();
         // on fait notre appel ajax paramétré (pas besoin de s'occuper de l'implémentation du XMLHttpRequest, jQuery le fait pour toi)
         $.ajax({
            type: 'POST',   // méthode de transmission des données
            url: 'filterLists.php',   // script à exécuter sur le serveur
            data: 'jour='+jour+'&mois='+mois+'&annee='+annee+'&ville='+ville+'&matiere='+matiere,   // données à passer au script via le tableau $_POST
            dataType: 'xml',   // type des données attendues en retour : ici xml
            cache: false,
            success: function(response) {   // traitement du résultat (= données reçues du serveur) une fois l'appel ajax réussi
               var code;
               // vu que la réponse est au format xml, on demande à jquery de trouver des noeuds spécifiques
               // et si ces noeuds contiennent des données alors on remplace les données des listes liées par celles renvoyées par le serveur
               // en clair : on remplace si nécessaire l'ensemble des lignes <option value=""></option> pour chaque liste qui n'a pas encore de sélection
               if ((code = $(response).find('jours').text()).length)    $('#jours').html(code);
               if ((code = $(response).find('mois').text()).length)     $('#mois').html(code);
               if ((code = $(response).find('annees').text()).length)   $('#annees').html(code);
               if ((code = $(response).find('villes').text()).length)   $('#villes').html(code);
               if ((code = $(response).find('matieres').text()).length) $('#matieres').html(code);
               if ((code = $(response).find('table').text()).length)    $('#table').html(code);
            }
         });
      }
   </script>
   <style type="text/css">
      body { font-family: "arial"; }
      table { width: 600px;;}
      table, tr, th, td { border: 1px solid black; border-collapse: collapse; padding: 4px;}
      .alignr { text-align: right; }
      .alignc { text-align: center; }
   </style>
</head>
<body>
   <?php
       
      // ICI MODIFIEZ LE PARAMETRAGE
      // Connexion à la base de données
      $server = 'localhost';
      $user   = 'tapsus';
      $pwd    = '3atchouM';
      $dbName = 'sigmascool';
      $cnx    = mysql_connect($server, $user, $pwd);
      $db     = mysql_select_db($dbName);
       
      // Au démarrage, aucune sélection : on extrait toutes les données individuellement pour chaque liste
       
      // JOURS
      $sql = 'SELECT DISTINCT DAY(t_session.date_) FROM t_session ORDER BY DAY(t_session.date_);';
      $qry = mysql_query($sql);
      while($row = mysql_fetch_row($qry)) {
         $jours[] = $row[0];
      }
       
      // MOIS
      $sql = 'SELECT DISTINCT MONTH(t_session.date_) FROM t_session ORDER BY MONTH(t_session.date_);';
      $qry = mysql_query($sql);
      while($row = mysql_fetch_row($qry)) {
         $mois[] = $row[0];
      }
       
      // ANNEES
      $sql = 'SELECT DISTINCT YEAR(t_session.date_) FROM t_session ORDER BY YEAR(t_session.date_);';
      $qry = mysql_query($sql);
      while($row = mysql_fetch_row($qry)) {
         $annees[] = $row[0];
      }
       
      // VILLES
      $sql = 'SELECT DISTINCT t_ville.idVille, t_ville.ville FROM t_ville ORDER BY t_ville.ville;';
      $qry = mysql_query($sql);
      while($row = mysql_fetch_row($qry)) {
         $villes[$row[0]] = $row[1];
      }
       
      // MATIERES
      $sql = 'SELECT DISTINCT t_matiere.idMatiere, t_matiere.matiere FROM t_matiere ORDER BY t_matiere.matiere;';
      $qry = mysql_query($sql);
      while($row = mysql_fetch_row($qry)) {
         $matieres[$row[0]] = $row[1];
      }
       
      // DONNES DE LA TABLE
      $sql = <<<SQL
SELECT t_ville.ville, t_session.date_, t_matiere.matiere, t_session_matiere.nbInscrit
FROM t_session_matiere  
   INNER JOIN t_matiere ON t_session_matiere.idMatiere = t_matiere.idMatiere
   INNER JOIN t_session ON t_session_matiere.idSession = t_session.idSession
   INNER JOIN t_ville   ON t_session.idVille           = t_ville.idVille
ORDER BY
   t_ville.ville ASC,  
   t_session.date_ DESC,  
   t_matiere.matiere ASC;
SQL;
      $qry = mysql_query($sql);
      while($row = mysql_fetch_assoc($qry)) {
         $data[] = $row;
      }
       
      // pour chaque liste il faut prévoir leur retrait du filtre  
      // en insérant une ligne vide en début de liste : <option value=""></option>
   ?>
 
   <p><strong>SESSIONS D'EXAMENS</strong></p>
   <p>Sélectionnez de un à plusieurs critères de recherche.</p>
   <form id="frmRecherche">
 
      <!-- Liste des jours -->
      <label for="jours">Jours</label>
      <select id="jours" onchange="filterLists();">
         <option value=""></option>
         <?php foreach($jours as$jour): ?>
         <option value="<?php echo $jour; ?>"><?php echo $jour; ?></option>
         <?php endforeach; ?>
      </select>
 
      <!-- Liste des mois -->
      <label for="mois">Mois</label>
      <select id="mois" onchange="filterLists();">
         <option value=""></option>
         <?php foreach($mois as $unMois): ?>
         <option value="<?php echo $unMois; ?>"><?php echo $unMois; ?></option>
         <?php endforeach; ?>
      </select>
 
      <!-- Liste des années -->
      <label for="annees">Années</label>
      <select id="annees" onchange="filterLists();">
         <option value=""></option>
         <?php foreach($annees as $annee): ?>
         <option value="<?php echo $annee; ?>"><?php echo $annee; ?></option>
         <?php endforeach; ?>
      </select>
 
      <!-- Liste des villes -->
      <label for="villes">Villes</label>
      <select id="villes" onchange="filterLists();">
         <option value=""></option>
         <?php foreach($villes as $id => $ville): ?>
         <option value="<?php echo $id; ?>"><?php echo $ville; ?></option>
         <?php endforeach; ?>
      </select>
 
      <!-- Liste des matières -->
      <label for="matieres">Matières</label>
      <select id="matieres" onchange="filterLists();">
         <option value=""></option>
         <?php foreach($matieres as $id => $matiere): ?>
         <option value="<?php echo $id; ?>"><?php echo $matiere; ?></option>
         <?php endforeach; ?>
      </select>
   </form>
   
   <!-- Données de la table -->
   <table>
      <thead>
         <tr>
            <th>VILLES</th>
            <th>DATES</th>
            <th>MATIERES</th>
            <th>NB Inscrits</th>
         </tr>
      </thead>
       
      <tbody id="table">
      <?php foreach($data as $row): ?>
         <tr>
            <td><?php echo $row['ville']; ?></td>
            <td class="alignc"><?php echo $row['date_']; ?></td>
            <td><?php echo $row['matiere']; ?></td>
            <td class="alignr"><?php echo $row['nbInscrit']; ?></td>
         </tr>
      <?php endforeach; ?>
      </tbody>
   </table>
</body>
</html>
