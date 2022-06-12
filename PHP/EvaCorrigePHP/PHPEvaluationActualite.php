<?php

//var_dump($_GET);
$nbMaxActualite = 10;

//var_dump($_COOKIE);
if (!empty($_COOKIE['nbMaxActu'])){
    $nbMaxActualite = $_COOKIE['nbMaxActu'];
}

if(isset($_GET['send'])){

    $nbMaxActualite = $_GET['nbactualite'];
    setcookie('nbMaxActu',$nbMaxActualite,time()+365*24*3600,null,null,false,true);

} else {
     // echo 'Le bouton n\'est pas envoyé<br><br>';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        *{
            font-family: Sans-Serif;
        }
        input[type="text"]{
            margin: 0px 7px;
            width: 50px;
            text-align: center;
        }
         .cadreInfo{
             border : 2px solid black;
             width: 80%;
             border-radius: 10px;
             padding: 14px 17px;
             margin: 14px 10px;
         }
        h3 {
            margin: 0px 0px 8px 0px;
            color: blue;
        }
    </style>
</head>
<body>

<?php
?>
<h1>Actualité en PHP</h1>


<?php



$actualite[]='Google sous enquête de la Commission Européenne pour la ...';
$info[]='Selon les informations de Reuters, la Commission Européenne a commencé à enquêter sur les pratiques de Google en matière de collecte de ...';

$actualite[]='Michael Bloomberg achète les mots-clés liés au climat sur ...';
$info[]='Aux États-Unis, si vous tapez "climat" ou "réchauffement climatique" sur Google, vous tombez sur le programme de Michael Bloomberg.';

$actualite[]='5 autres trucs vraiment bizarres trouvés dans Google Maps';
$info[]='Google Maps nous offre un regard pas tout à fait comme les autres sur le monde qui nous entoure. En quelques clics, il est ainsi possible de se ...';

$actualite[]='Google : Cette nouvelle fonctionnalité va vous protéger du ...';
$info[]='Lorsque Verified SMS est activé et que vous recevez un message d\'une entreprise enregistrée auprès de Google, nous convertissons le SMS ..';

$actualite[]='[Science friction] Données de santé, Google rompt la confiance';
$info[]='Encore une fois le même accusé, la même ligne de défense et la confiance qui s\'érode un peu plus. Google est impliqué dans un nouveau ...';

$actualite[]='Google accusé de mesures de représailles pour avoir licencié ...';
$info[]='Google licencie quatre employés impliqués dans des mouvements de protestation, suscitant la colère de certains de leurs collègues, qui ...';

$actualite[]='Apple Plans et Google Maps adoptent la vision russe de l ...';
$info[]='Concilier présence sur un marché, éthique et obligations légales n\'est pas toujours chose aisée. Pour les services de cartographie de Google ...';

$actualite[]='Google Stadia vs Nvidia GeForce Now : quel est le meilleur ...';
$info[]='Google Stadia est le dernier service cloud gaming à la mode. GeForce Now est la mutation d\'un des plus vieux services existants. Au final, qui ..';

$actualite[]='Black Friday: qui sont les acteurs du e-commerce les plus ...';
$info[]='Il faudra donc (aussi) compter avec Google. Et pour certains, plus que pour d\'autres. Car les sites Internet sont plus ou moins dépendants aux ...';

$actualite[]='Augmenter les visites de votre site web grâce à Google Analytics';
$info[]='Nous allons voir dans cet article comment utiliser vos données Google Analytics pour améliorer votre SEO et ainsi augmenter le trafic vers ...';

var_dump($actualite);


for ($indice = 0; $indice < $nbMaxActualite; $indice++){
    $intIndice = $indice + 1;
    echo '<div class="cadreInfo">';
    echo '<h3 class="titreInfo"><span style="color: red">'.$intIndice.'</span> '.$actualite[$indice].'</h3>';
    echo '<div class="descriInfo">'.$info[$indice].'</div>';
    echo '</div>';
}

?>



<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    Entrée nombre maximum actualité :
    <select name="nbactualite">
        <?php
        for ($i=1;$i<=10;$i++){
            $isselected = ($i == $nbMaxActualite)?'selected':'';
            echo '<option value="'.$i.'" '.$isselected.'>'.$i.'</option>';
        }
        ?>
    </select>
    <input type="submit" name="send" value="Envoyer!">
</form>



</body>
</html>
