<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="poids.php" method="post">
        Nom : <input type="text" name="nom" required><br>
        Poids : <input type="text" name="poids" required>( en KG )<br>
        Taille : <input type="text" name="taille" required>( en M)<br> 
        <input type="submit" name="send"><br>
    </form>
    <?php
        if (isset($_POST['send'])) {
            $nom = $_POST['nom'];
            $poids = $_POST['poids'];
            $taille = $_POST['taille'];
            $carre = $taille*$taille;
            $IMC = $poids/$carre;

            echo '<br>Bonjour '.$nom.', votre poids est de '.$poids.' et votre indice de Masse Musculaire (IMC) est de '.$IMC.'<br>';

            if ($IMC < 16.5) {
                echo 'ca veut dire que vous avez en dénutrition ou anorexie';
            }
            elseif ( $IMC < 18.5) {
                echo 'ca veut dire que vous avez en maigreur';
            }
            elseif ( $IMC < 25) {
                echo 'ca veut dire que vous avez en poids normal';
            }
            elseif ( $IMC < 30) {
                echo 'ca veut dire que vous avez en surpoids';
            }
            elseif ( $IMC < 35) {
                echo 'ca veut dire que vous avez en obésité modérée';
            }
            elseif ( $IMC < 40 ) {
                echo 'ca veut dire que vous avez en obésite sévère';
            }
            elseif ( $IMC > 40 ) {
                echo 'ca veut dire que vous avez en obésite morbide ou massive';
            }
        }
    ?>
</body>
</html>