<?php
    require_once 'template/connexionBDD.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require_once 'template/nav.php';
    ?>
    <h1>Activation du compte</h1>

    <?php
        $mail = strip_tags($_GET['mail']);
        $token = strip_tags($_GET['token']);
        echo $mail;
        echo '<br>';
        echo $token;

        $req = $bdd->prepare('SELECT * FROM users WHERE users_mail = ?');
        $req->execute(array($mail));

        $reponse = $req->fetch();
        
        $req->closeCursor();

        echo '<br>';
        echo $reponse['users_actif'];
        echo '<br>';
        echo $reponse['users_mail'];
        echo '<br>';
        echo $reponse['users_token'];
        echo '<br>';

        $infomessage ='';
        if ($reponse['users_actif']==1) {
            $infomessage = '<span style="color:red;">vous avez deja activé</span><br>';
        } else {
            if ($reponse['token'] == $token) {
                $req2 = $bdd->prepare('UPDATE users SET users_actif = 1 WHERE users_mail = ?');
                $req2->execute(array($mail));
                $req2->closeCursor();
                $infomessage = '<span style="color:green;">Félicitation, votre comptre est activé</span><br>';

            } else {
                $infomessage = '<span style="color:green;">votre compte ne peut pas activé pour le moment, Merci de réessayer plus tard</span><br>';
            }
        }

        echo '<p>'.$infomessage.'</p>';
    ?>
</body>
</html>