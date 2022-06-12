<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
        }
        tr,td{
            border: solid black 1px;
            text-align: center;
            padding: 3px;
        }
    </style>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>">
        Etudiant : <select name="ETUDIANT">
                        <option value="DUPONT">DUPONT</option>
                        <option value="DUPLIN">DUPLIN</option>
                        <option value="BLANC">BLANC</option>
                        <option value="NOIR">NOIR</option>
                        <option value="SCHMIDTH">SCHMIDTH</option>
                    </select><br><br>
        Matiere : <select name="MATIERE">
                        <option value="MATHS">MATHS</option>
                        <option value="GEO">GEO</option>
                        <option value="FR">FR</option>
                        <option value="SVT">SVT</option>
                    </select><br><br>
        Note : <select name="NOTE">
                    <?php
                        for ($i=0; $i < 21; $i++) { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    ?>
                </select><br><br>

        <input type="submit" value="Ajouter" name="send">

        <?php

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                echo 'la base de données est connecté';
            } catch (Exception $e) {
                die('erreur : ' . $e -> getMessage());
            }

            $req = $bdd->query('SELECT `controle_id`,`controle_exam`,`controle_matiere`,etudiant.`etudiant_id`,`etudiant_nom`,`etudiant_prenom`,`controle_note`,`controle_date` FROM `controle` INNER JOIN `etudiant` ON etudiant.etudiant_id=controle.etudiant_id ');

            echo '<table>';
            echo '<br>';
            echo '<tr><td>Nombre</td><td>Controle_id</td><td>Controle_exam</td><td>Controle_matiere</td><td>Etudiant_id</td><td>Etudiant_nom</td><td>Etudiant_prenom</td><td>Controle_note</td><td>Controle_date</td></tr>';
            
            $i = 1;
            while ($reponse = $req->fetch()) {
                echo '<tr>';
                echo '<td>'.$i++.'</td><td>'.$reponse['controle_id'].'</td><td>'.$reponse['controle_exam'].'</td><td>'.$reponse['controle_matiere'].'</td><td>'.$reponse['etudiant_id'].'</td><td>'.$reponse['etudiant_nom'].'</td><td>'.$reponse['etudiant_prenom'].'</td><td>'.$reponse['controle_note'].'</td><td>'.$reponse['controle_date'];
                echo '</tr>';
            }
            echo '</table>';

            $req->closeCursor();


            if (!empty($_GET['ETUDIANT']) && !empty($_GET['MATIERE']) && !empty($_GET['NOTE'])) {
                echo '<br>votre compte est complet<br>';
                if (isset($_GET['send'])) {
                    $etudiant = strip_tags($_GET['ETUDIANT']);
                    $matiere = strip_tags($_GET['MATIERE']);
                    $note = strip_tags($_GET['NOTE']);
                    
                    $strSQL = 'INSERT INTO `controle`(`controle_id`, `controle_exam`, `controle_matiere`, `etudiant_id`, `controle_note`, `controle_date`) VALUES (NULL,1,\'Maths\',1,20,NULL)';
                    $bdd->exec($strSQL);
                    
                    // echo 'votre compte est envoyer';
                } else {
                    echo 'votre compte \'est pas envoyer';
                }
            } else {
                echo '<br>votre compte n\'est pas complet<br>';
            }
        ?>
    </form>
</body>
</html>