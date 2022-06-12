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

            $strpseudo ='';
            $strmail ='';
            $infomessage ='';

            echo '<pre>';
            echo var_dump($_POST);
            echo '</pre>';

            
            foreach($_POST as $cle=>$element){
                echo $cle.' => <span style="color:red;"> '.($element).' </span><br>';
            }
            

            if (isset($_POST['send'])) {

                if (!empty($_POST['champpseudo']) && !empty($_POST['champmail']) && !empty($_POST['champpassword']) && !empty($_POST['champ-userpassword'])) {
                    echo 'les champs sont complets <br>';
                    $strpseudo = strip_tags($_POST['champpseudo']);
                    $strmail = strip_tags($_POST['champmail']);

                    $req3 = $bdd->prepare('SELECT * FROM users WHERE users_pseudo=:pseudo');
                    $req3->execute(array('pseudo'=>$strpseudo));
                    $reponse3 = $req3->fetch();

                    if ($reponse3['users_pseudo'] == $strpseudo) {
                        echo 'le pseudo existe déja';
                        $infomessage = '<span style="color:red;">le pseudo existe déja</span>';
                    }else {
                        echo 'c\'est ok pseudo';
                    
                                $req2 = $bdd->prepare('SELECT * FROM users WHERE users_mail=:mail');
                                $req2->execute(array('mail'=>$strmail));
                                $reponse = $req2->fetch();

                                if ($reponse['users_mail'] == $strmail) {
                                    $infomessage = '<span style="color:red;">l\'adresse mail est deja utilise </span>';
                                } else {

                                    if (strlen($_POST['champpassword']) >= 3) {
                                        echo 'accpeter ton mot de passe <br>';
                        
                                        if (($_POST['champpassword']) == ($_POST['champ-userpassword'])) {
                                            echo 'confrimation de ton mot de passe <br>';
                                            $strpassword = md5(strip_tags($_POST['champpassword']));
                                            $strtoken = md5(microtime(true)*1000);
                                            echo 'le code md5() de '.$strpassword .' est '.md5($_POST['champpassword']).'<br>';

                                            $req1 = $bdd->prepare('INSERT INTO users (users_pseudo, users_mail, users_password, users_token) VALUES (:pseudo,:mail,:password,:token)');
                                            $req1->execute(array('pseudo'=>$strpseudo,'mail'=>$strmail,'password'=>$strpassword, 'token'=>$strtoken));
                                            
                                            $infomessage = 'bravo, vous etes inscrit, vous recevez votre mail pour activer votre compte';
                                            

                                            $destinataire = $strmail;
                                            $sujet = 'Activation du compte';

                                            $strlocal = str_replace('inscription.php','',$_SERVER['HTTP_REFERER']);
                                            $strlienactivation = $strlocal.'activation.php?mail='.urlencode($strmail).'&token'.urldecode($strtoken);

                                            $message = 'bienvenue sur notre site, merci de bien vouloir cliquer '.$strlienactivation.' ----- mail généré automatique. merci de ne pas y repondre';

                                            $htmlMessage = htmlentities($message,ENT_QUOTES,"UTF-8");

                                            echo $strlienactivation.'<br>';
                                            echo $message;

                                            require '15_02_envoie_mail_gmail_Felix/PHPMailer-FromEric/src/Email.php';
                                            $obj = new EMail();

                                            $i = 0;
                                            do {
                                                echo 'Essai n°'.$i;
                                                $i++;

                                                $reponseMail = $obj->sendMail($destinataire,$sujet,' '.$i,$message,'');
                                                echo ($reponse == true)? ' ECHEC <br>':'C ESR BON OK <br>';
                                            } while ($i < 2 && $reponseMail == false);

                                            if ($reponseMail == false) {
                                            $infomessage = $infomessage.'<span style="color:red;">le mail n\'est pas pu envoyé, réessayer plus tard</span><br>';
                                            } else {
                                                $infomessage = '<span style="color:green;">le mail est envoyé avec succés</span><br>';

                                            }

                                            $strpseudo = '';
                                            $strmail = '';
                                        } else {
                                            $infomessage = '<span style="color:red;">ne pas confrimer de ton mot de passe </span> <br>';
                                        }
                                    } else {
                                        $infomessage = '<span style="color:red;">refuse, creer ton mot de passe de plus 8 lettres </span><br>';
                                    }
                                }
                    }
                } else {
                    $infomessage = 'les champs ne sont pas complet <br>';
                }
            } else {
                $infomessage = '<br> le bouton n\'est pas envoyé <br>';
            }
        
    ?>
    <header class="header">
        <nav class="navbar">
            NavBar
        </nav>
    </header>
    <div class="titre">
        Inscriptions utilisateurs
    </div>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="flex">
            <div class="text1">
                Pseudo :*
            </div>
            <input type="text" name="champpseudo" class="input" value="<?php echo $strpseudo ?>">
            <div class="text1">
                Adresse mail :*
            </div>
            <input type="email" name="champmail" class="input" value="<?php echo $strmail ?>">
            <div class="text1">
                Mot de passe :*
            </div>
            <input type="password" name="champpassword" class="input">
            <div class="text1">
                Mot de passe :*
            </div>
            <input type="password" name="champ-userpassword" class="input">
        </div>
        <input type="submit" name="send" value="Envoyez !" class="submit">
    </form>

    <?php
        echo '<center style="margin-top:2%;">'.$infomessage.'</center>';
    ?>
</body>
</html>