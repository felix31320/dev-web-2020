<?php

// C'est OK ça fonctionne le 13 décembre 2019

require 'PHPMailer-FromEric/src/Email.php';
$obj = new EMail();

$i = 0;
do {
    echo 'Essai n°'.$i;
    $i++;

    $reponse = $obj->sendMail('felix31320@gmail.com','Eric WEISS','Bonjour test depuis PHP le 18 décembre 13h30 '.$i, 'Ceci est un HTML message <b>en gras!</b>','');
    echo ($reponse == true)? ' C\'EST OK pour Felix<br>':'ECHEC <br>';
} while ($i < 2);
//} while ($i < 10 && $reponse == false);

