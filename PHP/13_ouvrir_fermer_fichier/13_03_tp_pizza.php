<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        echo $_SERVER["PHP_SELF"]; // voir ou il est son dossier dans PC C:\ ?
    ?>


<?php
    if(empty($_POST['pizza'])){ ?>

    
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> <!-- puis $_SERVE['PHP_SELF'] = reste dans la page de site -->
            <p> vous aimez la pizza ?</p>

                <input type="radio" name="pizza" value="oui" id="oui">
                <label for="oui">oui</label>

                <input type="radio" name="pizza" value="non" id="non">
                <label for="non">non</label>
                
                <input name="send" type="submit" value="envoyé !">
        </form>
        <?php
        } else {
        
        }
    
    ?>
    <?php
        if (isset($_POST['send'])) {
            echo '<br><br> vous avez clique envoyer <br><br>';

            if (empty($_POST['pizza'])) {
                echo 'vous avez oublie de cocher oui ou non';
            } else {
                if ($_POST['pizza'] == 'oui') {
                    echo ' tres bien, vous aimez la pizza';

                } else {
                    echo 'dommage';
                }
            }
        }

        echo '<br><br>';

        var_dump($_POST);
    ?>
</body>
</html>