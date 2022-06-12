<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        input[type="text"]{
            margin: 0px 7px;
            width: 50px;
            text-align: center;
        }
        .clsError{
            box-shadow: 0 0 5px 1px #FF0000;
        }
    </style>
</head>
<body>

<?php
?>
<h1>Table multiplication</h1>
<?php
 //var_dump($_GET);

$blnMessage = false;
$clsMessage = '';
 if(isset($_GET['send'])){

     if(!empty($_GET['nombre'])){
        if(intval($_GET['nombre'])>0) {
            //echo 'Ok je fais le calcul<br><br>';
            $intNombre = intval($_GET['nombre']);
            for($i=0;$i<11;$i++){
                echo $i.' x '.$intNombre.' = '.$i*$intNombre.'<br>';
            }
            echo '<br><br>';
        } else {
            echo $_GET['nombre'].' : Ce n\'est pas un nombre valide<br><br>';
            $blnMessage = true;
        }

     } else {
         echo 'le champ est vide<br><br>';
         $blnMessage = true;
     }
 } else {
     // echo 'Le bouton n\'est pas envoyé<br><br>';
 }
 if ($blnMessage==true){
     $clsMessage = 'class="clsError"';
 }
 ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    Entrée un nombre : <input  maxlength="4"  <?php echo $clsMessage; ?>type="text" name="nombre">
    <input type="submit" name="send" value="Envoyer!">
</form>



</body>
</html>
