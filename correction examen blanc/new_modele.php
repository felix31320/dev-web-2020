<?php
	include ('header.php');
?>
<br>
<br>
<br>
<hr>
<center><h3>Ajout Nouveau Modèle</h3>
<hr>
</center>
<center>
<fieldset>
<legend> Nouveau Modele </legend>
<form name="" method="post" action="">
Modèle : <input name="modele" type="text"/></br> 
Marque : <input name="marque" type="text"/></br>
Puissance : <input name="puissance" type="text"/></br>
Carburant : <input name="carburant" type="text"/></br>
<input type="submit" value="Ajouter" name="ok"/> <input type="submit" value="Annuler" name="annuler"/> 
</form>
</fieldset> 
</center>
<?php
//requete d'insertion
$modele = '';
$marque = '';
$puissance = '';
$carburant = '';

if(isset($_POST['ok'])){
    if(!empty($_POST['modele'])){

        if(!empty($_POST['marque'])){

            if(!empty($_POST['puissance'])){

                if(!empty($_POST['carburant'])){

                    $modele = htmlspecialchars($_POST['modele']);
                    $marque = htmlspecialchars($_POST['marque']);
                    $puissance = htmlspecialchars($_POST['puissance']);
                    $carburant = htmlspecialchars($_POST['carburant']);

                    $insert_modele = $db->prepare('INSERT INTO modele(modele,marque,puissance,carburant) VALUES (:fmodele,:fmarque,:fpuissance,:fcarburant)');
                    if($insert_modele->execute(array(':fmodele'=>$modele,':fmarque'=>$marque,':fpuissance'=>$puissance,':fcarburant'=>$carburant))){
                        $message = "Modele ajouté.";
                    }
                }
            }
        }
    }
}
if (isset($_POST['annuler'])){
	header('Location:liste_modele.php');
	}
?>
