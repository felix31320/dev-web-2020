<?php
    include 'connexion.php'; // on prend le fichier connexion.php pour se connecter le SQL
    include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proprietaire_ajout.php</title>
    <style>
        .form {
        width:500px; height:300px;
        border: solid blue 5px;
        border-radius: 10px;
        text-align: center;
        margin: auto;
        background-color:grey;
        margin-top: 50px;
        
        }
        .form h2 {
            margin:0;
            text-align:center;
            font-size:25px;
            position:relative;
            top:-20px;
        }
        .form h2 span {
            background:#fff;
            padding:0 5px;
        }
        .p{
            text-align: center;
            font-weight:bold;
            font-size:25px;
            margin-top: 50px;
            text-decoration: underline;
        }
        input{
            padding:5px;
            border-radius: 10px;
        }
    
    </style>
</head>
<body>

    <p class="p">Ajout Nouveau Proprietaire</p>


<?php

    if(isset($_POST['NOM']) && isset($_POST['PRENOM']) && isset($_POST['ADRESSE']) && isset($_POST['CODE_POSTAL']) && isset($_POST['VILLE']) && isset($_POST['TEL']) && isset($_POST['ID_VOITURE'])){ // ici on oblige d'ecrire sinon ca ne peut pas ajouter
        if (isset($_POST['send'])) { // isset ca veut dire que c'est la quand on clique le button "ajouter"

            $NOM = $_POST['NOM']; // on cree les variables 
            $PRENOM = $_POST['PRENOM']; 
            $ADRESSE = $_POST['ADRESSE'];
            $CODE_POSTAL = $_POST['CODE_POSTAL'];
            $VILLE = $_POST['VILLE'];
            $TEL = $_POST['TEL'];
            $ID_VOITURE = $_POST['ID_VOITURE'];


            $req = $bdd->prepare('INSERT INTO proprietaire (NOM,PRENOM,ADRESSE,CODE_POSTAL,VILLE,TEL,ID_VOITURE) VALUES (:NOM,:PRENOM,:ADRESSE,:CODE_POSTAL,:VILLE,:TEL,:ID_VOITURE)');
            $req->execute(array('NOM'=>$NOM,'PRENOM'=>$PRENOM,'ADRESSE'=>$ADRESSE,'CODE_POSTAL'=>$CODE_POSTAL,'VILLE'=>$VILLE,'TEL'=>$TEL,'ID_VOITURE'=>$ID_VOITURE)); // ici on demande d'ajouter une base des donnees

        }else{
            echo 'error';
        }
    }else{
        // echo 'completez la formulaire';
    }

?>
<div class="form"> <!-- voici on demande la formulaire pour creer un base des données -->
    <h2>
        <span>Nouveau Proprietaire</span>
    </h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"> <!-- $_SERVE ca sert de rester dans la page sinon on perds la formulaire -->
        <div style="margin-left: 100px;">
        <table>
            <tr>
            <td><label>Nom : </label></td><td><input type="text" name="NOM"></td>
            </tr>
            <tr>
            <td><label>Prenom : </label></td><td><input type="text" name="PRENOM"></td>
            </tr>
            <tr>
            <td><label>Adresse : </label></td><td><input type="text" name="ADRESSE"></td>
            </tr>
            <tr>
            <td><label>Code Postal : </label></td><td><input type="text" name="CODE_POSTAL"></td>
            </tr>
            <tr>
            <td><label>Ville : </label></td><td><input type="text" name="VILLE"></td>
            </tr>
            <tr>
            <td><label>Telephone : </label></td><td><input type="text" name="TEL"></td>
            </tr>
        </table>
    </div>

            <tr>
            <td><label>Immatriculation : </label></td><td><select class="o" name="ID_VOITURE" ></td>
            </tr>
        
        <?php

        $req2 = $bdd->query('SELECT * FROM voiture'); // on demande d'affiche les base des donnes de voiture

        while ($reponse = $req2->fetch()){
            
            echo '<option value="'.$reponse['immatriculation'].'">'.$reponse['immatriculation'].'</option>';
            
        }

        ?>

        </select><br>
        


        <input style="margin:10px;" type="submit" name="send" value="Ajouter"><input style="margin:10px;" type="submit" value="Annuler">
    </form>

    <?php
    
    ?>
</div>
</body>
</html>