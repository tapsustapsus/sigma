<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    
<title> header</title>
<meta http-equiv="contebt-type" content="text/html; charset=utf-8">
<meta http-equiv="content-language" content="fr"/>
<link  rel="stylesheet"  type="text/css" href="style_menu.css" >
<link rel="stylesheet"   type="text/css" href="style.css">
<script type="text/javascript" src="afficheresultat.js"></script>
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery.chained.js"></script>
<script type="text/javascript" src="verifier_qcm_couleur.js"></script>

<!-- pour retour haut de page rapidemenet-->
<!--https://www.bonbache.fr/code-jquery-retour-en-haut-du-site-avec-scroll-defilant-41.html-->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()>100){
            $('.retourHaut').fadeIn();
        }
        else
        {
            $('.retourHaut').fadeOut();
        }
    });
    $('.retourHaut').click(function(){
        $('html,body').animate({scrollTop:0},800);
        return false;
    });
});
</script>
<!-- pour retour haut de page rapidemenet-->
</head>


<body>
<?php
include("menu.php");

?>

<!--Entete-->
<img src="logo.jpg" width="100" height="50" alt="logo du site">
page header    Sigma Scool    

<hr>
<!-- pour retour haut de page rapidemenet-->
<a href='#' class='retourHaut'></a>
<!-- pour retour haut de page rapidemenet-->