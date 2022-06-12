<?php
    session_start();
    var_dump($_SESSION);
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

            $strpseudo ='';
            $strmail ='';
            $infomessage ='';

        
            if (isset($_POST['send'])) {

                if (!empty($_POST['champmail']) && !empty($_POST['champpassword'])) {
                    echo 'les champs sont complets <br>';
                    $strmail = strip_tags($_POST['champmail']);
                    $strpwd = md5(strip_tags($_POST['champpassword']));
                    echo $strmail;
                    echo '<br>';
                    echo $strpwd;

                    $req = $bdd->prepare('SELECT * FROM users WHERE users_mail=?');
                    $req->execute(array($strmail));
                    $reponse = $req->fetch();
                    $req->closeCursor();
                    echo '<br>';
                    echo 'Reponse BDD : '.$reponse['users_mail'];
                    echo '<br>';
                    echo 'Reponse BDD : '.$reponse['users_password'];

                    if ($strmail==$reponse['users_mail']) {
                        
                        if ($strpwd==$reponse['users_password']) {
                            
                            if ($reponse['users_actif']==1) {
                                $_SESSION['login']=$reponse['users_pseudo'];
                                $_SESSION['mail']=$reponse['users_mail'];
                                $infomessage = '<span style="color:green;">vous etes connecté</span><br>';
                                
                                ?>
                                <meta http-equiv="refresh" content="5;profil.php">
                                <?php
                                
                            } else {
                                $infomessage = '<span style="color:red;">le compte n\'est pas activé</span><br>';
                            }
                        } else {
                        $infomessage = '<span style="color:red;">le compte est incorrect</span><br>';
                        }
                    } else {
                        $infomessage = '<span style="color:red;">le compte n\'existe pas</span><br>';
                    }

                } else {
                    $infomessage = 'les champs ne sont pas complet <br>';
                }
            } else {
                $infomessage = '<br> le bouton n\'est pas envoyé <br>';
            }
        
    ?>
    <?php
        require_once 'template/nav.php';
    ?>
    <div class="titre">
        Connexion
    </div>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="flex">
            
            <div class="text1">
                Adresse mail :*
            </div>
            <input type="email" name="champmail" class="input" value="<?php echo $strmail ?>">
            <div class="text1">
                Mot de passe :*
            </div>
            <input type="password" name="champpassword" class="input">
            
        </div>
        <input type="submit" name="send" value="Envoyez !" class="submit">
    </form>

    <?php
        echo '<center style="margin-top:2%;">'.$infomessage.'</center>';
    ?>
</body>
</html>