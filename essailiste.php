<?php
include('commun/connection.php');
?>


<form method="POST">
    <select name="certif" id="region">
        <option value="">selectionner une region</option>
        <?php
        // Appel des certificats
        $req="SELECT id,certificat FROM Certificats ORDER BY certificat";
        $rep=mysqli_query($conn,$req);
        while ($row = mysqli_fetch_array($rep)){
            echo "<option value=".$row['id'].">".$row['certificat']."</option>";

        }
        ?>
        </select>
    </form>
    <select name="chapitre" id="departement">
        <option value=""> selectionner un chapitre</option>
        <?php
        // Appel du chapitre
        $req= "SELECT id, id_certificat, chapitre FROM Chapitres ORDER BY chapitre";
        $rep = mysqli_query($conn,$req);
        var_dump($rep);
        while ($row = mysqli_fetch_array($rep)){
            echo "<option value=".$row['id']." class=".$row['id_certificat'].">".$row['chapitre']."</option>";
        
        }
        
        ?>
        </select>
        <html>
        <head>
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery.chained.js"></script>

    </head>
    <body>
    <script type="text/javascript">$(function(){
    $("#departement").chained("#region");

});
</script>
</body>
</html>