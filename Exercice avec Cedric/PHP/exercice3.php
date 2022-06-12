<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <h2>Quelle nationalité ?</h2>
            <select name="nation" id="nation">
                <option value="france">france</option>
                <option value="anglais">anglais</option>
                <option value="pologne">pologne</option>
            </select><br>
        <h2>Vous etes </h2>
            <input type="radio" name="sexe" value="homme"> Homme
            <input type="radio" name="sexe" value="femme"> Femme
            <input type="radio" name="sexe" value="aucun"> Aucun
        
        <input type="submit" name="send">
    </form>

    <?php
        if (isset($_POST['send'])) {
            
                switch ($_POST['nation']) {
                    case ('france'):
                        echo '<br>tu es un francais<br>';
                        break;
                    case ('anglais'):
                        echo '<br>tu es un anglais<br>';
                        break;
                    case ('pologne'):
                        echo '<br>tu es un polognais<br>';
                        break;
                    default:
                        echo '<br>tu es qui ?<br>';
                        break;
                }

                switch ($_POST['sexe']) {
                    case ('homme'):
                        echo '<br>tu es un homme<br>';
                        break;
                    case ('femme'):
                        echo '<br>tu es une femme<br>';
                        break;
                    case ('aucun'):
                        echo '<br>tu es un invisible<br>';
                        break;
                    default:
                        echo '<br>tu es qui ?<br>';
                        break;
                    }
        }
    ?>
</body>
</html>