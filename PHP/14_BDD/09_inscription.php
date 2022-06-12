<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        .header{
            background-color: greenyellow;
            width: 100%;
            height: 75px;
            box-shadow: 2px 3px 5px 0px #000000;
        }
        .navbar{
            color: white;
            font-size: 23px;
            padding: 1.6%;
        }
        .titre{
            color: red;
            text-decoration: underline;
            font-size: 23px;
            text-align: center;
            margin-top: 2%;
        }
        .flex{
            display: flex;
            flex-direction: column;
        }
        .text1{
            text-align: center;
            font-size: 20px;
            margin-top: 1%;
            margin-bottom: 1%;
        }
        .input{
            width: 25%;
            text-align: center;
            transform: translate(140%,0%);
            padding: 0.5%;
            font-size: 18px;
        }
        .submit{
            transform: translate(475%,0%);
            padding: 10px 35px;
            margin-top: 2%;
            background-color: red;
            color: white;
            cursor: pointer;
        }
    </style>
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
                                            $strpassword = strip_tags($_POST['champpassword']);
                                            $strtoken = '';
                                            echo 'le code sha1() de '.$strpassword .' est '.md5($_POST['champpassword']).'<br>';

                                            $req1 = $bdd->prepare('INSERT INTO users (users_pseudo, users_mail, users_password, users_token) VALUES (:pseudo,:mail,:password,:token)');
                                            $req1->execute(array('pseudo'=>$strpseudo,'mail'=>$strmail,'password'=>$strpassword, 'token'=>$strtoken));
                                            
                                            $infomessage = 'bravo, vous etes inscrit';
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