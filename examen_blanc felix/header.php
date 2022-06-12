<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoSur</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        .header{
            background-color:grey;
            width: 100%;
            height: 120px;
        }
        .flexrow{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .image{
            margin-top: 25px;
            margin-left: 1%;
        }
        .image2{
            padding-top: 9px;
            padding-right: 15px;
        }
        .flexcol{
            display: flex;
            flex-direction: row;

        }

        .flexcol a{
            text-decoration: none;
            color: white;
            padding: 50px 27px;
            font-size: 17px
        }
        a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header> <!-- ici on est la tete du corps donc on est sur le navigateur -->
        <div class="header">
            <div class="flexrow">
                <div class="image">
                    <a href="index.php"><img src="https://www.autosur.fr/auto/img/header/logo-autosur.png" alt="logo"></a>
                </div>
                <div class="flexcol">
                    <a href="modele_liste.php">Modèle des listes</a>
                    <a href="modele_ajout.php">Nouvelles des Modèles</a>
                    <a href="voiture_liste.php">Voiture des listes</a>
                    <a href="voiture_ajout.php">Nouvelles voitures</a>
                    <a href="proprietaire_ajout.php">Nouveaux proprietaires</a>
                    <a href="recherche.php">Recherche les proprietaires</a>
                    
                </div>
                <div>
                    <a href="https://ville-pontamarcq.fr/wp-content/uploads/2019/11/Autosur-carte-visite.jpg"><img src="https://ville-pontamarcq.fr/wp-content/uploads/2019/11/Autosur-carte-visite.jpg" class="image2" height="100px" alt="contact"></a>
                </div>
            </div>
        </div>
    </header>
</body>
</html>