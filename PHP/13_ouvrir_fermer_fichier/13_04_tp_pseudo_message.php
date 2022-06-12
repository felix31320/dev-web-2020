<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        var_dump($_POST);
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"> <!-- $_SERVER['PHP_SELF'] reste toujours dans la page de site -->

        <span style="color:gold; text-align:center;" >Livre d'or</span><br><br>

        <label for="prenom1">Prenom</label>
        <input type="text" name="prenom1" id="prenom1">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="commentaire"></textarea>
        <br><br>
        <input name="send" type="submit" value="envoie"><br><br>

        <?php
        // 1er methode

        if (isset($_POST['send'])) { // isset est en "la cle"
            echo '<br> le bouton est envoye <br>';

            // if (empty($_POST['prenom1'])) {
            //     echo ' ==> le prenom est vide';
            // } else {
            //     echo ' ==> le prenom n\est pas vide';
            // }

            // if (isset($_POST['prenom1'])) {
            //     echo '=**=> le prenom est declare';
            // } else {
            //     echo '=**=> le prenom n\' est pas declare';
            // }

            if (!empty($_POST['prenom1']) && !empty($_POST['message'])) { // empty est en "la valeur"

                echo $_POST['prenom1'] . '<br>';
                echo $_POST['message'] . '<br>';
                $strprenom1 = strip_tags($_POST['prenom1']);
                $strmessage = strip_tags($_POST['message']);
                echo $strprenom1 . '<br>';
                echo $strmessage . '<br>';

                $mon_fichier = fopen( 'comment1.txt','a');
                $line1 = $strprenom1 . '=>' . $strmessage . "\n";
                fwrite($mon_fichier,$line1);
                fclose($mon_fichier);
            } else {
                echo 'votre prenom ou votre message sont vide !';
            }
            
        } else {
            echo 'le bouton n\'est pas envoyé';
        }

        // 2eme methode

            $comment = fopen('comment2.txt','a');

            $line = "\n";

            if (isset($_POST['send'])) { // isset = is set = est declare et la cle
                if (empty($_POST['prenom1'] || empty($_POST['message']))) {
                    echo 'ecrirez votre prenom et votre commentaire';
                } else {
                    fwrite($comment2,strip_tags($_POST['prenom1']) . ' ');
                    fwrite($comment2,strip_tags($_POST['message']));
                    fwrite($comment2,$line);
                }
            }
           
        ?>
    
    </form>
</body>
</html>