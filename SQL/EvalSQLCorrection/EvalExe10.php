<?php

try {
    //$bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
    $bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
    //echo 'La base de données est connecté';
} catch (Exception $e) {
    die('Erreur : ' .$e -> getMessage());
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau des notes Collège</title>
    <style>
        *{
            font-family: Sans-Serif;
        }
        table {
            border-collapse: collapse;
        }
        #liste1 td {
            border: 1px solid black;
            padding: 5px 10px;
        }
        #liste1 tr:first-child {
            background-color: #d6efff;
            text-align: center;
            font-weight: bold;
        }
        #liste1 {
            margin: auto;
        }
        #liste1 tr:nth-child(even) {
            background: #f1f1ed;
        }
        #liste2 td {
            padding: 3px 4px;
        }
        p{
            font-size: 20px;
        }
    </style>

</head>
<body>
<h1 style="text-align: center;">Tableau des notes Collège</h1>


<?php

$ErreurMsg = '';

if (isset($_GET['send'])){
    //echo 'le bouton est appuyé<br>';
    if(!empty($_GET['matiereSelect']) && !empty($_GET['etudiantSelect']) && !empty($_GET['noteSelect'])){
        //echo 'Les champs sont complet<br>';
        $strMatiereSelect= strip_tags($_GET['matiereSelect']);
        $strEtudiantSelect= strip_tags($_GET['etudiantSelect']);
        $strNoteSelect= strip_tags($_GET['noteSelect']);

        $req5 = $bdd->query('SELECT max(controle_exam) as maxexam FROM controle');
        echo '<br>';
        while ($reponse5 = $req5->fetch()){
            //echo 'La max est : '.$reponse5['maxexam'];
            $intMaxNext = $reponse5['maxexam']+1;
        }
        $req5->closeCursor();

        $req4 = $bdd->prepare('INSERT INTO controle (etudiant_id, controle_matiere, controle_note, controle_exam) VALUES (:etudiant,:matiere,:note,:exam)');
        $req4->execute(array('etudiant'=>$strEtudiantSelect,'matiere'=>$strMatiereSelect,'note'=>$strNoteSelect,'exam'=>$intMaxNext));

        //echo '<br>Articles ajouté avec succès';
        $ErreurMsg = '<p style="text-align: center;color:green">La note est ajoutée avec succès</p>';
    } else {
        //echo 'Les champs ne sont pas complet<br>';
        $ErreurMsg = '<p style="text-align: center;color:red">Les champs ne sont pas complet</p>';
    }
} else {
    //echo 'le bouton n\'est pas envoyé<br>';
    //$ErreurMsg = '<p style="text-align: center;color:red">le bouton n\'est pas envoyé</p>';
}

if($ErreurMsg != ''){
    echo $ErreurMsg;
}

?>


<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
    <table id="liste2">

        <tr><td>Matière : </td><td>

                <?php

                $req3 = $bdd->query('SELECT  controle_matiere  
                FROM controle  GROUP BY controle_matiere ORDER BY controle_matiere ASC');

                echo '<select style="width: 100%;    padding: 2px 5px;" name="matiereSelect">';
                echo '<option value="">Sélectionner la matière</option>';
                while ($reponse3 = $req3->fetch()){
                    echo '<option value="'.$reponse3['controle_matiere'].'">'.$reponse3['controle_matiere'].'</option>';
                }

                $req3->closeCursor();

                echo '</select>';
                ?>
            </td></tr>

        <tr><td>Etudiant : </td><td>
                <?php

                $req2 = $bdd->query('SELECT etudiant_nom, etudiant_prenom, controle.etudiant_id  
                FROM controle  INNER JOIN etudiant ON controle.etudiant_id = etudiant.etudiant_id
                GROUP BY  controle.etudiant_id
                ORDER BY etudiant_nom');

                echo '<select style="width: 100%;    padding: 2px 5px;" name="etudiantSelect">';
                echo '<option value="">Sélectionner un étudiant</option>';
                while ($reponse2 = $req2->fetch()){
                    echo '<option value="'.$reponse2['etudiant_id'].'">'.$reponse2['etudiant_nom'].' '.$reponse2['etudiant_prenom'].'</option>';
                }

                $req2->closeCursor();

                echo '</select>';
                ?>
            </td></tr>

        <tr><td>Note : </td><td>

                <?php
                echo '<select style="width: 100%;    padding: 2px 5px;" name="noteSelect">';
                echo '<option value="">Sélectionner la note</option>';
                for($i=20;$i>-1;$i--){
                    echo '<option value="'.$i.'">'.$reponse2['etudiant_nom'].' '.$i.'</option>';
                }
                ?>

            </td></tr>
    </table>
    <br>
    <input name="send" type="submit" value="Ajouter">
</form>

<?php
$req = $bdd->query('SELECT controle_id, controle_exam, controle_matiere, etudiant_nom, etudiant_prenom, 
controle.etudiant_id,controle_note,controle_date  
FROM controle  
INNER JOIN etudiant ON controle.etudiant_id = etudiant.etudiant_id 
ORDER BY controle_id DESC');

/*
 * SELECT controle_id, controle_exam, controle_matiere, etudiant_nom, controle.etudiant_id,controle_note,controle_date  FROM controle  INNER JOIN etudiant ON controle.etudiant_id = etudiant.etudiant_id GROUP BY  controle.etudiant_id ORDER BY etudiant_nom
 */
echo '<br><br><br>';
echo '<table id="liste1">';
echo '<tr>';
echo '<td>Nb</td><td>controle_id</td>
<td>controle_exam</td>
<td>controle_matiere</td>
<td>etudiant_id</td>
<td>etudiant_nom</td>
<td>etudiant_prenom</td>
<td>controle_note</td>
<td>controle_date</td>';
echo '</tr>';
$nb =0;
while ($reponse = $req->fetch()){
    $nb +=1;
    echo '<tr>';
    echo '<td>'.$nb.'</td>
<td style="text-align: right">'.$reponse['controle_id'].'</td>
<td style="text-align: right">'.$reponse['controle_exam'].'</td>
<td>'.$reponse['controle_matiere'].'</td>
<td style="text-align: right">'.$reponse['etudiant_id'].'</td>
<td style="text-align: left">'.$reponse['etudiant_nom'].'</td>
<td style="text-align: left">'.$reponse['etudiant_prenom'].'</td>
<td style="text-align: right">'.$reponse['controle_note'].'</td>
<td style="text-align: right">'.$reponse['controle_date'].'</td>';
    echo '</tr>';
}
echo '<table>';
$req->closeCursor();




?>
<br><br><br>



</body>
</html>