<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="tableau.php" method="post">
        <input type="text" name="rechercher" placeholder="tapez un mot">
        <input type="submit" name="send" value="lancer">
    </form>

    <?php

        $monde1 = array();

        $monde1['pays']='France';
        $monde1['capital']='Paris';
        $monde1['contraint']='Europe';
        
        $monde2 = array();
        $monde2['pays']='Anglais';
        $monde2['capital']='London';
        $monde2['contraint']='Europe';

        $monde3 = array();
        $monde3['pays']='Australie';
        $monde3['capital']='Canberra';
        $monde3['contraint']='Oceanie';

        $monde4 = array();
        $monde4['pays']='Etat unis';
        $monde4['capital']='Washington, D.C.';
        $monde4['contraint']='Amerique';

        $monde5 = array();
        $monde5['pays']='Japon';
        $monde5['capital']='Tokyo';
        $monde5['contraint']='Asie';

        $monde6 = array();
        $monde6['pays']='Allemange';
        $monde6['capital']='Berlin';
        $monde6['contraint']='Europe';

        $Terre = array($monde1,$monde2,$monde3,$monde4,$monde5,$monde6);

        if (isset($_POST['send'])) {
            
            if (empty($_POST['rechercher'])) {
                
                echo 'ecrirez un mot dans la case';
                
           } else {

               if ($_POST['rechercher']=='pays') {
               
                foreach ($Terre as $monde) {
                    foreach ($monde as $ILS) {
                        if ($ILS==$_POST['rechercher']) {
                            echo $monde['contraint'];
                        }
                    

                        // if ($monde['contraint']=='Europe') {
                        //     echo $monde['pays'].'<br>';
                        // }

                        // foreach ($monde as $pays ) {
                        //     echo ' '.$pays.'<br>';
                        // }

                    }    
                }
                }  
                
                
           }
        }
        
    ?>
</body>
</html>