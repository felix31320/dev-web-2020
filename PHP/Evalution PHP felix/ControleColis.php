
    <?php
    echo '<h1>Dimensions du colis</h1>';

    echo 'Verifiez que la somme de la longueur (L), largeur(l), et hauteur (H)';
    echo '<br>ne dépasse pas 150 cm, ou que le cote le plus long ne depasse pas 100 cm <br>';

    $lar = (int)$_GET['lar'];
    $lon = (int)$_GET['lon'];
    $hau = (int)$_GET['hau'];
    $total = $lar + $lon + $hau;
    
        if (isset($_GET['send'])) {

            echo '<br> Suivant les dimension données : <br>';

            echo '<br> la largeur : '.$lar.'<br>';
            echo 'la longueur : '.$lon.'<br>';
            echo 'la hauteur : '.$hau.'<br>';

            if ($total < 150){
                
                if ($lar < 100 && $lon < 100 && $hau < 100 ) {
                    echo '<p style="color:green;">les dimensions de ce colis sont acceptes</p>';
                    
                    if ((!intval($_GET['lar'])) && (!intval($_GET['lon'])) && (!intval($_GET['hau']))) {
                        echo '<p style="color:red;">un ou plusieurs champs ne sont pas un nombre valide</p>';
                        
                    }
                } else {
                    echo '<p style="color:red;"> un ou plusieur cotes depasse 100</p>';
                }
            } else {
                echo '<p style="color:red;">les dimensions de ce colis ne sont pas acceptées, la somme des cotes dépassent 150</p>';
            }
        }

?>