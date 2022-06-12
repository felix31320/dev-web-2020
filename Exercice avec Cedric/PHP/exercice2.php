<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body style="text-align: center; background-image:url(https://media.giphy.com/media/fWltMZuJFeeOI/giphy.gif); opacity:0.5;">
    <h1 style="color: yellow;">QUESTION</h1>
    <form action="exercice2.php" method="post" style="color: white;cursor:pointer;">
        Nom : <input type="text" name="nom" id="nom" style="color: brown;"><br><br>
        Secteur : <input type="text" name="secteur1" id="secteur1" class="f"><br><br>
        c'est votre secteur actuel ? : <input type="checkbox" name="secteur2" id="secteur2"><br><br>
        Salaire : <input type="text" name="salaire" id="salaire"><br><br>
        combien tu as eu ton bac : <input type="text" name="bac" id="bac"><br><br>
        <input type="submit" name="send" value="ok">
        
    </form>
    
    <?php

        if (isset($_POST['send'])) {

            $nom = $_POST['nom'];
            $salaire = $_POST['salaire'];
            $secteur1 = $_POST['secteur1'];
            
            $note = $_POST['bac'];

            if (!empty($nom) && !empty($salaire) && !empty($note)) {

            echo 'je m appelle '.$nom.'<br>';
            echo 'le salaire auquel j\'aspire pour bien vivre : <strong>'.$salaire.'€</strong><br>';
            echo 'la branche dans laquelle je travaille ou souhaiterais travailler : <strong>'.$secteur1.'</strong><br>';
            echo 'pour préciser : <strong>';

            if (isset($_POST['secteur2'])) {
                echo $secteur1.' est la branche dans laquelle vous travaillez actuellement.</strong><br>';
            } else {
                echo $secteur1.' est la branche dans laquelle vous souhaitez travailler.</strong><br>';
            }

            echo 'la note moyenne que j\'ai obtenue au bac : <strong>'.$note.'</strong><br>';

            if ($secteur1 == 'informatique') {
                echo '<br><hr><br>';
                echo '<br>super,vous travaillez dans le secteur de '.$secteur1. ' voulez-vous rencontrer d\'autres personnes dans votre cas ?';
            }

            } else {
                echo '<br>il faut mettre toutes les cases<br>';
            }

        }
    ?>
</body>
</html>