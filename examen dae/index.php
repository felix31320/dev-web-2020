<?php
    include 'header.php'; // prendre le fichier header.php
?>
<br><br>
<div class="placeliste">
    <table>
        <tr>
            <th>Lieu</th>
            <th>Modele</th>
            <th>Support</th>
            <th>Type</th>
            <th>Date</th>
        </tr>

        <form action="index.php" method="post" name="">
        
            <tr>
                <select class="placelieu" name="lieu">
                    <?php
                        $sql1=$bdd->prepare("SELECT lieu from accueil GROUP BY lieu"); // on prends la base des donnees de lieu
                        $sql1->execute();
                        while($lieu = $sql1->fetch(PDO::FETCH_ASSOC))
                        {
                        echo '<option value="'.$lieu['id'].'">'.$lieu['lieu'].'</option>';
                        } 
                    ?> 
                </select>
            </tr>

            <tr>
                <select class="placemodele" name="modele">
                    <?php
                        $sql2=$bdd->prepare("SELECT modele from accueil GROUP BY modele");  // on prends la base des donnees de modele
                        $sql2->execute();
                        while($modele = $sql2->fetch(PDO::FETCH_ASSOC))
                        {
                        echo '<option value="'.$modele['id'].'">'.$modele['modele'].'</option>';
                        } 
                    ?> 
                </select>
            </tr>

            <tr>
                <select class="placesupport" name="support">
                    <?php
                        $sql3=$bdd->prepare("SELECT support from accueil GROUP BY support");  // on prends la base des donnees de support
                        $sql3->execute();
                        while($support = $sql3->fetch(PDO::FETCH_ASSOC))
                        {
                        echo '<option value="'.$support['id'].'">'.$support['support'].'</option>';
                        }
                    ?> 
                </select>
            </tr>

            <tr>
                <select class="placetype" name="type">
                    <?php
                        $sql4=$bdd->prepare("SELECT `type` from accueil GROUP BY `type`");  // on prends la base des donnees de type
                        $sql4->execute();
                        while($type = $sql4->fetch(PDO::FETCH_ASSOC))
                        {
                        echo '<option value="'.$type['id'].'">'.$type['type'].'</option>';
                        }
                    ?> 
                </select>
            </tr>

            <tr>
                <input type="date" name="date">
            </tr>

            <input class="ajouter" type="submit" name="send" value="Ajouter">
        </form>

        <?php // on va ajouter un bdd dans SQL 
            
            $LIEU1 = '';
            $MODELE1 = '';
            $SUPPORT1 = '';
            $TYPE1 = '';
            $DATE1 = '';

            if(isset($_POST['send'])){
                if(!empty($_POST['lieu'])){
            
                    if(!empty($_POST['modele'])){
                            
                        if(!empty($_POST['support'])){
    
                            if(!empty($_POST['type'])){
    
                                if(!empty($_POST['date'])){
    
                                    $LIEU1 = htmlspecialchars($_POST['lieu']); // les variables prennent les valeurs dans input
                                    $MODELE1 = htmlspecialchars($_POST['modele']);
                                    $SUPPORT1 = htmlspecialchars($_POST['support']);
                                    $TYPE1 = htmlspecialchars($_POST['type']);
                                    $DATE1 = htmlspecialchars($_POST['date']);

                                    $insert_modele = $bdd->prepare('INSERT INTO accueil (lieu,modele,support,type,date) VALUES (:flieu,:fmodele,:fsupport,:ftype,:fdate)');
                                    if($insert_modele->execute(array(':flieu'=>$LIEU1,':fmodele'=>$MODELE1,':fsupport'=>$SUPPORT1,':ftype'=>$TYPE1,':fdate'=>$DATE1))){
                                        $message = "ajoutée.";
                                        // on a reussi d'ajouter un bdd dans SQL
                                    }
                                            
                                }
                            }
                        }
                    }
                }
            }
        ?>
    
    <?php
        $sql5=$bdd->prepare("SELECT * from accueil");  // on prends toute la base des donnees dans accueil
        $sql5->execute();
        while($rep = $sql5->fetch(PDO::FETCH_ASSOC)) 
        {
        echo '<tr><td>'.$rep['lieu'].'</td><td>'.$rep['modele'].'</td><td>'.$rep['support'].'</td><td>'.$rep['type'].'</td><td>'.$rep['date'].'</td>';
        }
    ?>
    </table>
</div>
<?php
    include 'footer.php';
?>

