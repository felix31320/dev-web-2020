<?php
    include 'connexion.php'; // on prend le fichier connexion.php pour se connecter le SQL
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voiture_liste.php</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            padding: 5px 10px;
        }
        tr:first-child{
           background-color: #cafaff;
           text-align: center;
           font-weight: bold;
        }

        .form {
        width:500px; height:180px;
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
    
    <p class="p">Recherche Voiture par Proprietaire</p>
    
<?php // je n'ai pas reussi les resultats, toujours erreur mais quand meme je sais ce que je fais le php sans le resultat en HTML

$NoM= $_POST['NoM'];
$PREnom= $_POST['PREnom'];

$req = $bdd->query("SELECT * FROM voiture,modele,voiture WHERE proprietaire.ID_VOITURE=voiture.id AND voiture.id_modele=modele.id AND proprietaire.NOM='$NoM' AND proprietaire.PRENOM='$PREnom'");

echo '<div style=\'margin-left:38%;\'>';
echo '<br><br>';
echo '<table>';
echo '<tr>';
echo '<td>immatriculation</td><td>Couleur</td><td>Kilometrage</td><td>Id_modele</td>';
echo '</tr>';
while ($reponse = $req->fetch()){
    echo '<tr>';
    echo '<td>'.$reponse['couleur'].'</td><td>'.$reponse['kilometrage'].'</td><td>'.$reponse['modele'].'</td><td>'.$reponse['marque'].'</td>';
    echo '</tr>';
}
echo '<table>';
echo '</div>';

?>    
<div class="form">
    <h2>
        <span>rechercher</span>
    </h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label>nom : </label>
        <input type="text" name="NoM">
        <label>prenom : </label>
        <input type="text" name="PREnom">

        <input type="submit" name="send" value="rechercher">
    </form>
</div>

<?php

?>
</body>
</html>