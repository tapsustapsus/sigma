<!DOCTYPE html>
<html>
    <head>
        <meta CHARSET ="utf-8">
        <link rel="stylesheet"   type="text/css" href="style.css">
        <script type="text/javascript" src="afficheresultat.js"></script>
    </head>    
 <body>
     <p class="ombre"> Cas Clinique </p>
  <p class="paragraphe"> Patient âgé de 70 ans, hospitalisé au service de pneumologie pour exacerbation de BPCO-> mis sous augmentin
A j5 du traitement ATB, il a présenté une diarrhée non sanglante à la fréquence de 5-7 selles /j 
Le diagnostic de diarrhée nosocomiale post antibiothérapie a été retenu.  
</p>
 <form action="#">
     <div>
      <label class="question">1/ Quel est le principal germe à évoquer chez ce patient?</label><br>
      <input type="text" name="question1" size="70"/>
     </div>
     <div>
      <label class="question">2/ Quel (s) examen(s) bactériologique(s) demandez vous et pourquoi?</label><br/>
      <input type="text" name="question2" size="60"/>
     </div>
     <div>
      <label class="question">3/ Quel est l’élément à l’examen direct de la coproculture en faveur de diagnostic suspecté ?</label><br>
      <input type="text" name="question3" size="50%"/>
     </div>
     <div>
      <label class="question">4/ Faut-il réaliser un antibiogramme  et pourquoi?</label><br/>
      <textarea name="question4" rows="4"  cols="50"></textarea>
     </div>
     <input type="RESET" vzlue="Reset"/>
     <button id="btnAction" name="btnAction" type="Reset" style="background-color:transparent;border:0;"><img src="logo.jpg"  alt="Vider le panier" width="90" height="25" /></button>

</form>
<!--*****afficher ou masquer la réponse************-->
<a href="javascript:visibilite('reponse1');">Réponse Question 1 </a><br>
<div class="reponse" id="reponse1" style="display:none;">
   La bonne réponse ABDE La bonne réponse ABDE La bonne réponse ABDE La bonne réponse ABDE La bonne réponse ABDE
    La bonne réponse ABDE La bonne réponse ABDE La bonne réponse ABDE La bonne réponse ABDE La bonne réponse ABDE
<hr>
</div>

<a href="javascript:visibilite('reponse2');">Réponse Question 2 </a><br>
<div class="reponse" id="reponse2" style="display:none;">
    La bonne réponse A222222222222222222222222ne réponse ABDE La bonne réponse ABDE La bonne réponse ABDE
    La bonne réponse ABD222222222222222222222222222ponse ABDE La bonne réponse ABDE La bonne réponse ABDE
<br>
</div>

<a href="javascript:visibilite('reponse3');">Réponse Question 3 </a><br>
<div class="reponse" id="reponse3" style="display:none;">
    La bonne réponse AB33333333333333333333333333333333333333333333333a bonne réponse ABDE La bonne réponse ABDE
    La bonne répo33333333333333333333333333333333333333333333333333333333333e réponse ABDE La bonne réponse ABDE
<br>
</div>

<a href="javascript:visibilite('reponse4');">Réponse Question 4 </a><br>
<div class="reponse" id="reponse4" style="display:none;">
    La bonne 44444444444444444444444444444444444444444444444444444444444444444e réponse ABDE La bonne réponse ABDE
    La bonne répo444444444444444444444444444444444444444444444444444444444444nne réponse ABDE La bonne réponse ABDE
<br>
</div>
        
</body>
</html>